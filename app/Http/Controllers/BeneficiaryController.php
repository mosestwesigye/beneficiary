<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use App\Helpers\GeneralHelper;
use App\Models\Beneficiary;
use App\Models\CustomField;
use App\Models\CustomFieldMeta;
use App\Models\Package;
use App\Models\LoanRepayment;
use App\Models\Setting;
use App\Models\User;
use App\Models\District;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Clickatell\Api\ClickatellHttp;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class BeneficiaryController extends Controller
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
    public function index()
    {
        if (!Sentinel::hasAccess('beneficiaries')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = Beneficiary::where('branch_id', session('branch_id'))->get();

        return view('beneficiary.data', compact('data'));
    }

    public function pending()
    {
        if (!Sentinel::hasAccess('beneficiaries')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = Beneficiary::where('branch_id', session('branch_id'))->where('active', 0)->get();

        return view('beneficiary.pending', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Sentinel::hasAccess('beneficiaries.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $users = User::all();
        $user = array();
        foreach ($users as $key) {
            $user[$key->id] = $key->first_name . ' ' . $key->last_name;
        }

        $districts = District::all();
        $district = array();
        foreach ($districts as $key) {
            $district[$key->id] = $key->name;
        }

        //get custom fields
        $custom_fields = CustomField::where('category', 'Beneficiaries')->get();
        return view('beneficiary.create', compact('user', 'district', 'custom_fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Sentinel::hasAccess('beneficiaries.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = new beneficiary();
        $beneficiary->first_name = $request->first_name;
        $beneficiary->last_name = $request->last_name;
        $beneficiary->user_id = Sentinel::getUser()->id;
        $beneficiary->gender = $request->gender;
        $beneficiary->dob = $request->dob;
        $beneficiary->district = $request->district;
        $beneficiary->marital_status = $request->marital_status;
        $beneficiary->ratio_id = $request->ratio_id;
        $beneficiary->national_id = $request->national_id;
        $beneficiary->bank = $request->bank;
        $beneficiary->account_number = $request->account_number;
        $beneficiary->mode_of_payment = $request->mode_of_payment;
        $beneficiary->package_amount = $request->package_amount;
        $beneficiary->address = $request->address;
        $beneficiary->city = $request->city;
        $beneficiary->zone = $request->zone;
        $beneficiary->place_of_residence = $request->place_of_residence;
        $beneficiary->arrival_date = $request->arrival_date;
        $beneficiary->village = $request->village;
        $beneficiary->working_status = $request->working_status;
        $beneficiary->special_needs = $request->special_needs;
        $beneficiary->spouse_name = $request->spouse_name;
        $beneficiary->spouse_contact = $request->spouse_contact;
        $beneficiary->number_dependants = $request->number_dependants;
        $beneficiary->country = $request->country;
        $beneficiary->title = $request->title;
        $beneficiary->branch_id = session('branch_id');
        $beneficiary->mobile = $request->mobile;
        $beneficiary->notes = $request->notes;
        $beneficiary->email = $request->email;
        if ($request->hasFile('photo')) {
            $file = array('photo' => Input::file('photo'));
            $rules = array('photo' => 'required|mimes:jpeg,jpg,bmp,png');
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                Flash::warning(trans('general.validation_error'));
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $Beneficiary->photo = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path() . '/uploads',
                    $request->file('photo')->getClientOriginalName());
            }

        }

        $beneficiary->loan_officers = serialize($request->loan_officers);
        $date = explode('-', date("Y-m-d"));
        $beneficiary->year = $date[0];
        $beneficiary->month = $date[1];
        $files = array();
        if (!empty(array_filter($request->file('files')))) {
            $count = 0;
            foreach ($request->file('files') as $key) {
                $file = array('files' => $key);
                $rules = array('files' => 'required|mimes:jpeg,jpg,bmp,png,pdf,docx,xlsx');
                $validator = Validator::make($file, $rules);
                if ($validator->fails()) {
                    Flash::warning(trans('general.validation_error'));
                    return redirect()->back()->withInput()->withErrors($validator);
                } else {
                    $files[$count] = $key->getClientOriginalName();
                    $key->move(public_path() . '/uploads',
                        $key->getClientOriginalName());
                }
                $count++;
            }
        }
        $beneficiary->files = serialize($files);
        $beneficiary->username = $request->username;
        if (!empty($request->password)) {
            $rules = array(
                'repeatpassword' => 'required|same:password',
                'username' => 'required|unique:beneficiaries'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                Flash::warning('Passwords do not match');
                return redirect()->back()->withInput()->withErrors($validator);

            } else {
                $beneficiary->password = md5($request->password);
            }
        }
        $beneficiary->save();
        $custom_fields = CustomField::where('category', 'beneficiaries')->get();
        foreach ($custom_fields as $key) {
            $custom_field = new CustomFieldMeta();
            $id = $key->id;
            $custom_field->name = $request->$id;
            $custom_field->parent_id = $Beneficiary->id;
            $custom_field->custom_field_id = $key->id;
            $custom_field->category = "Beneficiaries";
            $custom_field->save();
        }
        GeneralHelper::audit_trail("Added Beneficiary  with id:" . $beneficiary->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect('beneficiary/data');
    }


    public function show($beneficiary)
    {
        if (!Sentinel::hasAccess('beneficiaries.view')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $users = User::all();
                $user = array();
                foreach ($users as $key) {
                    $user[$key->id] = $key->first_name . ' ' . $key->last_name;
        }

        return view('beneficiary.show', compact('beneficiary', 'user'));
    }


    public function edit($beneficiary)
    {
        if (!Sentinel::hasAccess('beneficiaries.update')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $users = User::all();
        $user = array();
        foreach ($users as $key) {
            $user[$key->id] = $key->first_name . ' ' . $key->last_name;
        }
        //get custom fields
        $custom_fields = CustomField::where('category', 'beneficiaries')->get();
        return view('beneficiary.edit', compact('beneficiary', 'user', 'custom_fields'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.update')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = beneficiary::find($id);
        $beneficiary->first_name = $request->first_name;
        $beneficiary->last_name = $request->last_name;
        $beneficiary->user_id = Sentinel::getUser()->id;
        $beneficiary->gender = $request->gender;
        $beneficiary->dob = $request->dob;
        $beneficiary->district = $request->district;
        $beneficiary->marital_status = $request->marital_status;
        $beneficiary->ratio_id = $request->ratio_id;
        $beneficiary->national_id = $request->national_id;
        $beneficiary->bank = $request->bank;
        $beneficiary->account_number = $request->account_number;
        $beneficiary->mode_of_payment = $request->mode_of_payment;
        $beneficiary->package_amount = $request->package_amount;
        $beneficiary->address = $request->address;
        $beneficiary->city = $request->city;
        $beneficiary->zone = $request->zone;
        $beneficiary->place_of_residence = $request->place_of_residence;
        $beneficiary->arrival_date = $request->arrival_date;
        $beneficiary->village = $request->village;
        $beneficiary->working_status = $request->working_status;
        $beneficiary->special_needs = $request->special_needs;
        $beneficiary->spouse_name = $request->spouse_name;
        $beneficiary->spouse_contact = $request->spouse_contact;
        $beneficiary->number_dependants = $request->number_dependants;
        $beneficiary->country = $request->country;
        $beneficiary->title = $request->title;
        $beneficiary->branch_id = session('branch_id');
        $beneficiary->mobile = $request->mobile;
        $beneficiary->notes = $request->notes;
        $beneficiary->email = $request->email;
        if ($request->hasFile('photo')) {
            $file = array('photo' => Input::file('photo'));
            $rules = array('photo' => 'required|mimes:jpeg,jpg,bmp,png');
            $validator = Validator::make($file, $rules);
            if ($validator->fails()) {
                Flash::warning(trans('general.validation_error'));
                return redirect()->back()->withInput()->withErrors($validator);
            } else {
                $eneficiary->photo = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->move(public_path() . '/uploads',
                    $request->file('photo')->getClientOriginalName());
            }

        }
        $beneficiary->loan_officers = serialize($request->loan_officers);
        $files = unserialize($beneficiary->files);
        $count = count($files);
        if (!empty(array_filter($request->file('files')))) {
            foreach ($request->file('files') as $key) {
                $count++;
                $file = array('files' => $key);
                $rules = array('files' => 'required|mimes:jpeg,jpg,bmp,png,pdf,docx,xlsx');
                $validator = Validator::make($file, $rules);
                if ($validator->fails()) {
                    Flash::warning(trans('general.validation_error'));
                    return redirect()->back()->withInput()->withErrors($validator);
                } else {
                    $files[$count] = $key->getClientOriginalName();
                    $key->move(public_path() . '/uploads',
                        $key->getClientOriginalName());
                }

            }
        }
        $beneficiary->files = serialize($files);
        $beneficiary->username = $request->username;
        if (!empty($request->password)) {
            $rules = array(
                'repeatpassword' => 'required|same:password'
            );
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                Flash::warning('Passwords do not match');
                return redirect()->back()->withInput()->withErrors($validator);

            } else {
                $beneficiary->password = md5($request->password);
            }
        }
        $beneficiary->save();
        $custom_fields = CustomField::where('category', 'beneficiaries')->get();
        foreach ($custom_fields as $key) {
            if (!empty(CustomFieldMeta::where('custom_field_id', $key->id)->where('parent_id', $id)->where('category',
                'beneficiaries')->first())
            ) {
                $custom_field = CustomFieldMeta::where('custom_field_id', $key->id)->where('parent_id',
                    $id)->where('category', 'beneficiaries')->first();
            } else {
                $custom_field = new CustomFieldMeta();
            }
            $kid = $key->id;
            $custom_field->name = $request->$kid;
            $custom_field->parent_id = $id;
            $custom_field->custom_field_id = $key->id;
            $custom_field->category = "beneficiaries";
            $custom_field->save();
        }
        GeneralHelper::audit_trail("Updated Beneficiary  with id:" . $beneficiary->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect('beneficiary/data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!Sentinel::hasAccess('beneficiaries.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        beneficiary::destroy($id);
        Beneficiary::where('beneficiary_id', $id)->delete();
        //LoanRepayment::where('beneficiary_id', $id)->delete();
        GeneralHelper::audit_trail("Deleted Beneficiary  with id:" . $id);
        Flash::success(trans('general.successfully_deleted'));
        return redirect('beneficiary/data');
    }

    public function deleteFile(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = beneficiary::find($id);
        $files = unserialize($beneficiary->files);
        @unlink(public_path() . '/uploads/' . $files[$request->id]);
        $files = array_except($files, [$request->id]);
        $beneficiary->files = serialize($files);
        $beneficiary->save();


    }

    public function approve(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.approve')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $Beneficiary = beneficiary::find($id);
        $Beneficiary->active = 1;
        $Beneficiary->save();
        GeneralHelper::audit_trail("Approved Beneficiary  with id:" . $beneficiary->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }

    public function decline(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.approve')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = beneficiary::find($id);
        $beneficiary->active = 0;
        $beneficiary->save();
        GeneralHelper::audit_trail("Declined Beneficiary  with id:" . $beneficiary->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }
    public function blacklist(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.blacklist')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = beneficiary::find($id);
        $beneficiary->blacklisted = 1;
        $beneficiary->save();
        GeneralHelper::audit_trail("Blacklisted Beneficiary  with id:" . $id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }

    public function unBlacklist(Request $request, $id)
    {
        if (!Sentinel::hasAccess('Beneficiaries.blacklist')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $beneficiary = beneficiary::find($id);
        $beneficiary->blacklisted = 0;
        $beneficiary->save();
        GeneralHelper::audit_trail("Undo Blacklist for Beneficiary  with id:" . $id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }
}
