<?php

namespace App\Http\Controllers;

use Aloha\Twilio\Twilio;
use App\Models\Beneficiary;
use App\Models\BeneficiaryGroup;
use App\Models\BeneficiaryGroupMember;
use App\Models\CustomField;
use App\Models\CustomFieldMeta;
use App\Models\Setting;
use App\Models\User;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class BeneficiaryGroupController extends Controller
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
        $data = BeneficiaryGroup::all();

        return view('beneficiary.group.data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //get custom fields
        return view('beneficiary.group.create', compact(''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new BeneficiaryGroup();
        $group->name = $request->name;
        $group->notes = $request->notes;
        $group->save();
        Flash::success(trans('general.successfully_saved'));
        return redirect('beneficiary/group/data');
    }


    public function show($beneficiary_group)
    {
        $beneficiaries = array();
        foreach (Beneficiary::all() as $key) {
            $beneficiaries[$key->id] = $key->first_name . ' ' . $key->last_name . '(' . $key->unique_number . ')';
        }
        return view('beneficiary.group.show', compact('beneficiary_group', 'beneficiaries'));
    }


    public function edit($Beneficiary_group)
    {
        return view('beneficiary.group.edit', compact('beneficiary_group'));
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
        $group = BeneficiaryGroup::find($id);
        $group->name = $request->name;
        $group->notes = $request->notes;
        $group->save();
        Flash::success(trans('general.successfully_saved'));
        return redirect('beneficiary/group/data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        BeneficiaryGroup::destroy($id);
        Flash::success(trans('general.successfully_deleted'));
        return redirect('beneficiary/group/data');
    }

    public function addBeneficiary(Request $request, $id)
    {
        if(BeneficiaryGroupMember::where('Beneficiary_id',$request->Beneficiary_id)->count()>0){
            Flash::warning(trans('general.Beneficiary_already_added_to_group'));
            return redirect()->back();
        }
        $member = new BeneficiaryGroupMember();
        $member->Beneficiary_group_id = $id;
        $member->Beneficiary_id = $request->Beneficiary_id;
        $member->save();
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }
    public function removeBeneficiary(Request $request, $id)
    {
        BeneficiaryGroupMember::destroy($id);
        Flash::success(trans('general.successfully_saved'));
        return redirect()->back();
    }
}
