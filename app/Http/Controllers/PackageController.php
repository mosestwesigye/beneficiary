<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use App\Helpers\GeneralHelper;
use App\Models\CustomField;
use App\Models\CustomFieldMeta;
use App\Models\Beneficiary;
use App\Models\Package;
use App\Models\LoanRepayment;
use App\Models\Setting;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Clickatell\Api\ClickatellHttp;
use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class PackageController extends Controller
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
        if (!Sentinel::hasAccess('packages')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = package::where('branch_id', session('branch_id'))->get();

        return view('package.data', compact('data'));
    }

    public function pending()
    {
        if (!Sentinel::hasAccess('beneficiaries')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $data = Package::where('branch_id', session('branch_id'))->where('active', 0)->get();

        return view('package.pending', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!Sentinel::hasAccess('packages.create')) {
            Flash::warning(trans('general.permission_denied'));
            return redirect('/');
        }
        $beneficiaries = array();
        foreach (Beneficiary::all() as $key) {
            $beneficiaries[$key->id] = $key->first_name . ' ' . $key->last_name . '(' . $key->ratio_id . ')';
        }

        if (isset($request->beneficiary_id)) {
            $beneficiary_id = $request->beneficiary_id;
        } else {
            $beneficiary_id = '';
        }

        //get custom fields
        $custom_fields = CustomField::where('category', 'packages')->get();
        return view('package.create',
            compact('beneficiaries', 'beneficiary_id', 'custom_fields'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Sentinel::hasAccess('packages.create')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = new Package();
        $package->beneficiary_id = $request->beneficiary_id;
        $package->user_id = Sentinel::getUser()->id;
        $package->item = $request->item;
        $package->quantity = $request->quantity;
        $package->unit = $request->unit;
        $package->mode_of_payment = $request->mode_of_payment;
        $package->package_amount = $request->package_amount;
        $package->branch_id = session('branch_id');
        $package->description = $request->description;
        $date = explode('-', date("Y-m-d"));
        $package->year = $date[0];
        $package->month = $date[1];
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
        $package->files = serialize($files);
        $package->save();
        GeneralHelper::audit_trail("Added package  with id:" . $package->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect('package/data');
    }


    public function show($package)
    {
        if (!Sentinel::hasAccess('packages.view')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }

        $users = User::all();
                $user = array();
                foreach ($users as $key) {
                    $user[$key->id] = $key->first_name . ' ' . $key->last_name;
        }
        return view('package.show', compact('package', 'user'));
    }


    public function edit($package)
    {
        if (!Sentinel::hasAccess('packages.update')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $users = Package::all();
        $user = array();
        foreach ($users as $key) {
            $user[$key->id] = $key->first_name . ' ' . $key->last_name;
        }
        $beneficiaries = array();
        foreach (Beneficiary::all() as $key) {
            $beneficiaries[$key->id] = $key->first_name . ' ' . $key->last_name . '(' . $key->unique_number . ')';
        }
        //get custom fields
        $custom_fields = CustomField::where('category', 'packages')->get();
        return view('package.edit', compact('package', 'beneficiaries', 'user', 'custom_fields'));
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
        $package = package::find($id);
        $package->first_name = $request->first_name;
        $package->last_name = $request->last_name;
        $package->user_id = Sentinel::getUser()->id;
        $package->item = $request->item;
        $package->quantity = $request->quantity;
        $package->unit = $request->unit;
        $package->mode_of_payment = $request->mode_of_payment;
        $package->package_amount = $request->package_amount;
        $package->branch_id = session('branch_id');
        $package->notes = $request->notes;
        $date = explode('-', date("Y-m-d"));
        $package->year = $date[0];
        $package->month = $date[1];
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
        $package->files = serialize($files);
        $package->save();
        GeneralHelper::audit_trail("Updated package  with id:" . $package->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect('package/data');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (!Sentinel::hasAccess('packages.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        package::destroy($id);
        Package::where('beneficiary_id', $id)->delete();
        GeneralHelper::audit_trail("Deleted package  with id:" . $id);
        Flash::success(trans('general.successfully_deleted'));
        return redirect('package/data');
    }

    public function deleteFile(Request $request, $id)
    {
        if (!Sentinel::hasAccess('packages.delete')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = package::find($id);
        $files = unserialize($package->files);
        @unlink(public_path() . '/uploads/' . $files[$request->id]);
        $files = array_except($files, [$request->id]);
        $package->files = serialize($files);
        $package->save();


    }

    public function approve(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.approve')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = package::find($id);
        $package->active = 1;
        $package->save();
        GeneralHelper::audit_trail("Approved package  with id:" . $package->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }

    public function decline(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.approve')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = package::find($id);
        $package->active = 0;
        $package->save();
        GeneralHelper::audit_trail("Declined package  with id:" . $package->id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }
    public function blacklist(Request $request, $id)
    {
        if (!Sentinel::hasAccess('beneficiaries.blacklist')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = package::find($id);
        $package->blacklisted = 1;
        $package->save();
        GeneralHelper::audit_trail("Blacklisted package  with id:" . $id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }

    public function unBlacklist(Request $request, $id)
    {
        if (!Sentinel::hasAccess('Beneficiaries.blacklist')) {
            Flash::warning("Permission Denied");
            return redirect('/');
        }
        $package = package::find($id);
        $package->blacklisted = 0;
        $package->save();
        GeneralHelper::audit_trail("Undo Blacklist for package  with id:" . $id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }

    public function pdfBorrowerStatement($beneficiary)
    {
        $loans = Package::where('beneficiary_id', $beneficiary->id) ->get();
        PDF::AddPage();
        PDF::writeHTML(View::make('package.pdf_beneficiary_statement', compact('loans'))->render());
        PDF::SetAuthor('Tererai Mugova');
        PDF::Output($beneficiary->title . ' ' . $beneficiary->first_name . ' ' . $beneficiary->last_name . " - Client Statement.pdf",
            'D');
    }

    public function printBorrowerStatement($borrower)
    {
        $loans = Package::where('beneficiary_id', $beneficiary->id)->get();
        return view('package.print_beneficiary_statement', compact('loans'));
    }

}
