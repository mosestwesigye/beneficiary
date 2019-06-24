<?php

namespace App\Http\Controllers;

use App\Helpers\GeneralHelper;
use App\Helpers\RouteSms;
use App\Helpers\Infobip;
use App\Models\Beneficiary;
use App\Models\Email;
use App\Models\Setting;
use App\Models\Sms;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Clickatell\Rest;
use Illuminate\Http\Request;
use Aloha\Twilio\Twilio;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class CommunicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('sentinel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmail()
    {
        if (!Sentinel::hasAccess('communication')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = Email::where('branch_id', session('branch_id'))->get();
        return view('communication.email', compact('data'));
    }

    public function indexSms()
    {
        if (!Sentinel::hasAccess('communication')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = Sms::where('branch_id', session('branch_id'))->get();
        return view('communication.sms', compact('data'));
    }


    public function createEmail(Request $request)
    {
        if (!Sentinel::hasAccess('communication.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiaries = array();
        $beneficiaries["0"] = "All beneficiaries";
        foreach (Beneficiary::all() as $key) {
            $beneficiaries[$key->id] = $key->first_name . ' ' . $key->last_name . ' (' . $key->unique_number . ')';
        }
        if (isset($request->beneficiary_id)) {
            $selected = $request->beneficiary_id;
        } else {
            $selected = '';
        }
        return view('communication.create_email', compact('beneficiaries', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeEmail(Request $request)
    {
        if (!Sentinel::hasAccess('communication.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $body = "";
        $recipients = 1;
        if ($request->send_to == 0) {
            foreach (Beneficiary::all() as $beneficiary) {
                $body = $request->message;
//lets build and replace available tags
                $body = str_replace('{beneficiaryTitle}', $beneficiary->title, $body);
                $body = str_replace('{beneficiaryFirstName}', $beneficiary->first_name, $body);
                $body = str_replace('{beneficiaryLastName}', $beneficiary->last_name, $body);
                $body = str_replace('{beneficiaryAddress}', $beneficiary->address, $body);
                $body = str_replace('{beneficiaryMobile}', $beneficiary->mobile, $body);
                $body = str_replace('{beneficiaryEmail}', $beneficiary->email, $body);
                $body = str_replace('{beneficiaryTotalLoansDue}',
                    round(GeneralHelper::beneficiary_loans_total_due($beneficiary->id), 2), $body);
                $body = str_replace('{beneficiaryTotalLoansBalance}',
                    round((GeneralHelper::beneficiary_loans_total_due($beneficiary->id) - GeneralHelper::beneficiary_loans_total_paid($beneficiary->id)),
                        2), $body);
                $body = str_replace('{beneficiaryTotalLoansPaid}', GeneralHelper::beneficiary_loans_total_paid($beneficiary->id),
                    $body);
                $email = $beneficiary->email;
                if (!empty($email)) {
                    Mail::raw($body, function ($message) use ($request, $beneficiary, $email) {
                        $message->from(Setting::where('setting_key', 'company_email')->first()->setting_value,
                            Setting::where('setting_key', 'company_name')->first()->setting_value);
                        $message->to($email);
                        $headers = $message->getHeaders();
                        $message->setContentType('text/html');
                        $message->setSubject($request->subject);

                    });

                }
                $recipients = $recipients + 1;
            }
            $mail = new Email();
            $mail->user_id = Sentinel::getUser()->id;
            $mail->message = $body;
            $mail->subject = $request->subject;
            $mail->branch_id = session('branch_id');;
            $mail->recipients = $recipients;
            $mail->send_to = 'All beneficiaries';
            $mail->save();
            GeneralHelper::audit_trail("Send  email to all beneficiaries");
            Flash::success("Email successfully sent");
            return redirect('communication/email');
        } else {
            $body = $request->message;
            $beneficiary = beneficiary::find($request->send_to);
            //lets build and replace available tags
            $body = str_replace('{beneficiaryTitle}', $beneficiary->title, $body);
            $body = str_replace('{beneficiaryFirstName}', $beneficiary->first_name, $body);
            $body = str_replace('{beneficiaryLastName}', $beneficiary->last_name, $body);
            $body = str_replace('{beneficiaryAddress}', $beneficiary->address, $body);
            $body = str_replace('{beneficiaryMobile}', $beneficiary->mobile, $body);
            $body = str_replace('{beneficiaryEmail}', $beneficiary->email, $body);
            $body = str_replace('{beneficiaryTotalLoansDue}',
                round(GeneralHelper::beneficiary_loans_total_due($beneficiary->id), 2), $body);
            $body = str_replace('{beneficiaryTotalLoansBalance}',
                round((GeneralHelper::beneficiary_loans_total_due($beneficiary->id) - GeneralHelper::beneficiary_loans_total_paid($beneficiary->id)),
                    2), $body);
            $body = str_replace('{beneficiaryTotalLoansPaid}', GeneralHelper::beneficiary_loans_total_paid($beneficiary->id),
                $body);
            $email = $beneficiary->email;
            if (!empty($email)) {
                Mail::raw($body, function ($message) use ($request, $beneficiary, $email) {
                    $message->from(Setting::where('setting_key', 'company_email')->first()->setting_value,
                        Setting::where('setting_key', 'company_name')->first()->setting_value);
                    $message->to($email);
                    $headers = $message->getHeaders();
                    $message->setContentType('text/html');
                    $message->setSubject($request->subject);

                });
                $mail = new Email();
                $mail->user_id = Sentinel::getUser()->id;
                $mail->message = $body;
                $mail->subject = $request->subject;
                $mail->branch_id = session('branch_id');;
                $mail->recipients = $recipients;
                $mail->send_to = $beneficiary->first_name . ' ' . $beneficiary->last_name . '(' . $beneficiary->unique_number . ')';
                $mail->save();
                GeneralHelper::audit_trail("Sent email to beneficiary ");
                Flash::success("Email successfully sent");
                return redirect('communication/email');
            }

        }
        Flash::success("Email successfully sent");
        return redirect('communication/email');
    }


    public function deleteEmail($id)
    {
        if (!Sentinel::hasAccess('communication.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        Email::destroy($id);
        GeneralHelper::audit_trail("Deleted email record with id:" . $id);
        Flash::success("Email successfully deleted");
        return redirect('communication/email');
    }

    public function createSms(Request $request)
    {
        if (!Sentinel::hasAccess('communication.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiaries = array();
        $beneficiaries["0"] = "All beneficiaries";
        foreach (beneficiary::all() as $key) {
            $beneficiaries[$key->id] = $key->first_name . ' ' . $key->last_name . ' (' . $key->unique_number . ')';
        }
        if (isset($request->beneficiary_id)) {
            $selected = $request->beneficiary_id;
        } else {
            $selected = '';
        }
        return view('communication.create_sms', compact('beneficiaries', 'selected'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeSms(Request $request)
    {
        if (!Sentinel::hasAccess('communication.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $body = "";
        $recipients = 1;
        if (Setting::where('setting_key', 'sms_enabled')->first()->setting_value == 1) {
            if ($request->send_to == 0) {

                $active_sms = Setting::where('setting_key', 'active_sms')->first()->setting_value;
                foreach (beneficiary::all() as $beneficiary) {
                    $body = $request->message;
//lets build and replace available tags
                    $body = str_replace('{beneficiaryTitle}', $beneficiary->title, $body);
                    $body = str_replace('{beneficiaryFirstName}', $beneficiary->first_name, $body);
                    $body = str_replace('{beneficiaryLastName}', $beneficiary->last_name, $body);
                    $body = str_replace('{beneficiaryAddress}', $beneficiary->address, $body);
                    $body = str_replace('{beneficiaryMobile}', $beneficiary->mobile, $body);
                    $body = str_replace('{beneficiaryEmail}', $beneficiary->email, $body);
                    $body = str_replace('{beneficiaryTotalLoansDue}',
                        round(GeneralHelper::beneficiary_loans_total_due($beneficiary->id), 2), $body);
                    $body = str_replace('{beneficiaryTotalLoansBalance}',
                        round((GeneralHelper::beneficiary_loans_total_due($beneficiary->id) - GeneralHelper::beneficiary_loans_total_paid($beneficiary->id)),
                            2), $body);
                    $body = str_replace('{beneficiaryTotalLoansPaid}',
                        GeneralHelper::beneficiary_loans_total_paid($beneficiary->id),
                        $body);
                    $email = $beneficiary->email;
                    $body = trim(strip_tags($body));
                    if (!empty($beneficiary->mobile)) {
                        $active_sms = Setting::where('setting_key', 'active_sms')->first()->setting_value;
                        if ($active_sms == 'twilio') {
                            $twilio = new Twilio(Setting::where('setting_key', 'twilio_sid')->first()->setting_value,
                                Setting::where('setting_key', 'twilio_token')->first()->setting_value,
                                Setting::where('setting_key', 'twilio_phone_number')->first()->setting_value);
                            $twilio->message('+' . $beneficiary->mobile, $body);
                        }
                        if ($active_sms == 'routesms') {
                            $host = Setting::where('setting_key', 'routesms_host')->first()->setting_value;
                            $port = Setting::where('setting_key', 'routesms_port')->first()->setting_value;
                            $username = Setting::where('setting_key', 'routesms_username')->first()->setting_value;
                            $password = Setting::where('setting_key', 'routesms_password')->first()->setting_value;
                            $sender = Setting::where('setting_key', 'sms_sender')->first()->setting_value;
                            $SMSText = $body;
                            $GSM = $beneficiary->mobile;
                            $msgtype = 2;
                            $dlr = 1;
                            $routesms = new RouteSms($host, $port, $username, $password, $sender, $SMSText, $GSM,
                                $msgtype,
                                $dlr);
                            $routesms->Submit();
                        }
                        if ($active_sms == 'clickatell') {
                            $clickatell = new Rest(Setting::where('setting_key',
                                'clickatell_api_id')->first()->setting_value);
                            $response = $clickatell->sendMessage(array($beneficiary->mobile), $body);
                        }
                        if ($active_sms == 'infobip') {
                            $infobip = new Infobip(Setting::where('setting_key',
                                'sms_sender')->first()->setting_value, $body,
                                $beneficiary->mobile);
                        }

                    }
                    $recipients = $recipients + 1;
                }
                $sms = new Sms();
                $sms->user_id = Sentinel::getUser()->id;
                $sms->message = $body;
                $sms->gateway = $active_sms;
                $sms->branch_id = session('branch_id');;
                $sms->recipients = $recipients;
                $sms->send_to = 'All beneficiaries';
                $sms->save();
                GeneralHelper::audit_trail("Sent SMS   to all beneficiary");
                Flash::success("SMS successfully sent");
                return redirect('communication/sms');
            } else {
                $body = $request->message;
                $beneficiary = beneficiary::find($request->send_to);
                //lets build and replace available tags
                $body = str_replace('{beneficiaryTitle}', $beneficiary->title, $body);
                $body = str_replace('{beneficiaryFirstName}', $beneficiary->first_name, $body);
                $body = str_replace('{beneficiaryLastName}', $beneficiary->last_name, $body);
                $body = str_replace('{beneficiaryAddress}', $beneficiary->address, $body);
                $body = str_replace('{beneficiaryMobile}', $beneficiary->mobile, $body);
                $body = str_replace('{beneficiaryEmail}', $beneficiary->email, $body);
                $body = str_replace('{beneficiaryTotalLoansDue}',
                    round(GeneralHelper::beneficiary_loans_total_due($beneficiary->id), 2), $body);
                $body = str_replace('{beneficiaryTotalLoansBalance}',
                    round((GeneralHelper::beneficiary_loans_total_due($beneficiary->id) - GeneralHelper::beneficiary_loans_total_paid($beneficiary->id)),
                        2), $body);
                $body = str_replace('{beneficiaryTotalLoansPaid}', GeneralHelper::beneficiary_loans_total_paid($beneficiary->id),
                    $body);
                $body = trim(strip_tags($body));
                if (!empty($beneficiary->mobile)) {
                    $active_sms = Setting::where('setting_key', 'active_sms')->first()->setting_value;
                    if ($active_sms == 'twilio') {
                        $twilio = new Twilio(Setting::where('setting_key', 'twilio_sid')->first()->setting_value,
                            Setting::where('setting_key', 'twilio_token')->first()->setting_value,
                            Setting::where('setting_key', 'twilio_phone_number')->first()->setting_value);
                        $twilio->message('+' . $beneficiary->mobile, $body);
                    }
                    if ($active_sms == 'routesms') {
                        $host = Setting::where('setting_key', 'routesms_host')->first()->setting_value;
                        $port = Setting::where('setting_key', 'routesms_port')->first()->setting_value;
                        $username = Setting::where('setting_key', 'routesms_username')->first()->setting_value;
                        $password = Setting::where('setting_key', 'routesms_password')->first()->setting_value;
                        $sender = Setting::where('setting_key', 'sms_sender')->first()->setting_value;
                        $SMSText = $body;
                        $GSM = $beneficiary->mobile;
                        $msgtype = 2;
                        $dlr = 1;
                        $routesms = new RouteSms($host, $port, $username, $password, $sender, $SMSText, $GSM, $msgtype,
                            $dlr);
                        $routesms->Submit();
                    }
                    if ($active_sms == 'clickatell') {
                        $clickatell = new Rest(Setting::where('setting_key',
                            'clickatell_api_id')->first()->setting_value);
                        $response = $clickatell->sendMessage(array($beneficiary->mobile), $body);
                    }
                    if ($active_sms == 'infobip') {
                        $infobip = new Infobip(Setting::where('setting_key',
                            'sms_sender')->first()->setting_value, $body,
                            $beneficiary->mobile);

                    }
                    $sms = new Sms();
                    $sms->user_id = Sentinel::getUser()->id;
                    $sms->message = $body;
                    $sms->gateway = $active_sms;
                    $sms->recipients = $recipients;
                    $sms->branch_id = session('branch_id');;
                    $sms->send_to = $beneficiary->first_name . ' ' . $beneficiary->last_name . '(' . $beneficiary->unique_number . ')';
                    $sms->save();
                    Flash::success("SMS successfully sent");
                    return redirect('communication/sms');
                }

            }
            GeneralHelper::audit_trail("Sent SMS   to beneficiary");
            Flash::success("Sms successfully sent");
            return redirect('communication/sms');
        } else {
            Flash::warning('SMS service is disabled, please go to settings and enable it');
            return redirect('setting/data')->with(array('error' => 'SMS is disabled, please enable it.'));
        }
    }


    public function deleteSms($id)
    {
        if (!Sentinel::hasAccess('communication.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        Sms::destroy($id);
        GeneralHelper::audit_trail("Deleted sms record with id:" . $id);
        Flash::success("SMS successfully deleted");
        return redirect('communication/sms');
    }

}
