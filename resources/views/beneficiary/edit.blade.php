@extends('layouts.master')
@section('title')
    {{trans_choice('general.edit',1)}} {{trans_choice('general.beneficiary',1)}}
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans_choice('general.edit',1)}} {{trans_choice('general.beneficiary',1)}}</h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        {!! Form::open(array('url' => url('beneficiary/'.$beneficiary->id.'/update'), 'method' => 'post', 'name' => 'form',"enctype"=>"multipart/form-data")) !!}
        <div class="box-body">
            <div class="col-md-12">
                <p class="bg-navy color-palette">{{trans_choice('general.required',1)}} {{trans_choice('general.field',2)}}</p>

                <div class="form-group">
                    {!! Form::label('title',trans_choice('general.title',1),array('class'=>'')) !!}
                    {!! Form::select('title',array('Mr'=>trans_choice('general.Mr',1),'Mrs'=>trans_choice('general.Mrs',1), 'Miss'=>trans_choice('general.Miss',1),'Ms'=>trans_choice('general.Ms',1),'Dr'=>trans_choice('general.Dr',1),'Prof'=>trans_choice('general.Prof',1),'Rev'=>trans_choice('general.Rev',1)),$beneficiary->title, array('class' => 'form-control',)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('first_name',trans_choice('general.first_name',1),array('class'=>'')) !!}
                    {!! Form::text('first_name',$beneficiary->first_name, array('class' => 'form-control', 'placeholder'=>trans_choice('general.first_name',1),'required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('last_name',trans_choice('general.last_name',1),array('class'=>'')) !!}
                    {!! Form::text('last_name',$beneficiary->last_name, array('class' => 'form-control', 'placeholder'=>trans_choice('general.last_name',1),'required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('gender',trans_choice('general.gender',1),array('class'=>'')) !!}
                    {!! Form::select('gender',array('Male'=>trans_choice('general.Male',1),'Female'=>trans_choice('general.Female',1)),$beneficiary->gender, array('class' => 'form-control','required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('dob',trans_choice('general.dob',1),array('class'=>'')) !!}
                    {!! Form::text('dob',$beneficiary->dob, array('class' => 'form-control', 'placeholder'=>trans_choice('general.dob',1),'required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('title',trans_choice('general.marital_status',1),array('class'=>'')) !!}
                    {!! Form::select('title',array('Single'=>trans_choice('general.single',1),'Married'=>trans_choice('general.married',1), 'Divorced'=>trans_choice('general.divorced',1)),$beneficiary->marital_status, array('class' => 'form-control',)) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('country',trans_choice('general.country',1),array('class'=>'')) !!}
                    {!! Form::text('country',$beneficiary->country, array('class' => 'form-control','required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('district',trans_choice('general.district',1),array('class'=>'')) !!}
                    {!! Form::text('district',$beneficiary->district, array('class' => 'form-control','required'=>'required')) !!}

                  </div>
                <div class="form-group">
                    {!! Form::label('mobile',trans_choice('general.mobile',1),array('class'=>'')) !!}
                    {!! Form::text('mobile',$beneficiary->mobile, array('class' => 'form-control', 'placeholder'=>trans_choice('general.numbers_only',1))) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('ratio_id',trans_choice('general.ratio_id',1),array('class'=>'')) !!}
                    {!! Form::text('ratio_id',$beneficiary->ratio_id, array('class' => 'form-control','required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('national_id',trans_choice('general.national_id',1),array('class'=>'')) !!}
                    {!! Form::text('national_id',$beneficiary->national_id, array('class' => 'form-control','required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('bank',trans_choice('general.bank',1),array('class'=>'')) !!}
                    {!! Form::text('bank',$beneficiary->bank, array('class' => 'form-control','required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('account_number',trans_choice('general.account_number',1),array('class'=>'')) !!}
                    {!! Form::text('account_number',$beneficiary->account_number, array('class' => 'form-control','required'=>'required')) !!}
                </div>

                <p class="bg-red color-palette">{{trans_choice('general.beneficiary',1)}} {{trans_choice('general.package',2)}}</p>

                <div class="form-group">
                    {!! Form::label('mode_of_payment',trans_choice('general.mode_of_payment',1),array('class'=>'')) !!}
                    {!! Form::select('mode_of_payment',array('Cash'=>trans_choice('general.cash',1)),$beneficiary->mode_of_payment, array('class' => 'form-control',)) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('package_amount',trans_choice('general.package_amount',1),array('class'=>'')) !!}
                    {!! Form::text('package_amount',$beneficiary->package_amount, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>


                <p class="bg-green color-palette">{{trans_choice('general.optional',1)}} {{trans_choice('general.field',2)}}</p>



                <div class="form-group">
                    {!! Form::label('email',trans_choice('general.email',1),array('class'=>'')) !!}
                    {!! Form::text('email',$beneficiary->email, array('class' => 'form-control', 'placeholder'=>trans_choice('general.email',1))) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('address',trans_choice('general.address',1),array('class'=>'')) !!}
                    {!! Form::text('address',$beneficiary->address, array('class' => 'form-control', 'placeholder'=>trans_choice('general.unique_number',1))) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('city',trans_choice('general.city',1),array('class'=>'')) !!}
                    {!! Form::text('city',$beneficiary->city, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('zone',trans_choice('general.zone',1),array('class'=>'')) !!}
                    {!! Form::text('zone',$beneficiary->zone, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('place_of_residence',trans_choice('general.place_of_residence',1),array('class'=>'')) !!}
                    {!! Form::text('place_of_residence',$beneficiary->place_of_residence, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('arrival_date',trans_choice('general.arrival_date',1),array('class'=>'')) !!}
                    {!! Form::text('arrival_date',$beneficiary->arrival_date, array('class' => 'form-control', 'placeholder'=>trans_choice('general.dob',1),'required'=>'required')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('village',trans_choice('general.village',1),array('class'=>'')) !!}
                    {!! Form::text('village',$beneficiary->village, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('working_status',trans_choice('general.working_status',1),array('class'=>'')) !!}
                    {!! Form::select('working_status',array('Employee'=>trans_choice('general.Employee',1),'Owner'=>trans_choice('general.Owner',1),'Student'=>trans_choice('general.Student',1),'Overseas Worker'=>trans_choice('general.Overseas Worker',1),'Pensioner'=>trans_choice('general.Pensioner',1),'Unemployed'=>trans_choice('general.Unemployed',1)),$beneficiary->working_status, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('special_needs',trans_choice('general.special_needs',1),array('class'=>'')) !!}
                    {!! Form::text('special_needs',$beneficiary->special_needs, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('spouse_name',trans_choice('general.spouse_name',1),array('class'=>'')) !!}
                    {!! Form::text('spouse_name',$beneficiary->spouse_name, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('spouse_contact',trans_choice('general.spouse_contact',1),array('class'=>'')) !!}
                    {!! Form::text('spouse_contact',$beneficiary->spouse_contact, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('number_dependants',trans_choice('general.number_dependants',1),array('class'=>'')) !!}
                    {!! Form::text('number_dependants',$beneficiary->number_dependants, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('photo',trans_choice('general.photo',1),array('class'=>'')) !!}
                    {!! Form::file('photo', array('class' => 'form-control', 'placeholder'=>"")) !!}
                    @if(!empty($beneficiary->photo))
                        <a class="fancybox" rel="group" href="{{ url(asset('uploads/'.$beneficiary->photo)) }}"> <img
                                    src="{{ url(asset('uploads/'.$beneficiary->photo)) }}" width="120"/></a>
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('notes',trans_choice('general.description',1),array('class'=>'')) !!}
                    {!! Form::textarea('notes',$beneficiary->notes, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('files',trans_choice('general.file',2). ' '.trans_choice('general.beneficiary_file_types',2),array('class'=>'')) !!}
                    {!! Form::file('files[]', array('class' => 'form-control', 'multiple'=>"")) !!}
                    <div class="col-sm-12">
                        {{trans_choice('general.select_thirty_files',2)}}<br>
                        @foreach(unserialize($beneficiary->files) as $key=>$value)
                            <span id="file_{{$key}}_span"><a href="{!!asset('uploads/'.$value)!!}"
                                                             target="_blank">{!!  $value!!}</a> <button value="{{$key}}"
                                                                                                        id="{{$key}}"
                                                                                                        onclick="delete_file(this)"
                                                                                                        type="button"
                                                                                                        class="btn btn-danger btn-xs">
                                    <i class="fa fa-trash"></i></button> </span><br>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <hr>
                </div>
                <div class="form-group">
                    {!! Form::label('loan_officers',trans_choice('general.staff_officer_access',2),array('class'=>'')) !!}
                    {!! Form::select('loan_officers[]',$user,unserialize($beneficiary->loan_officers), array('class' => 'form-control select2','multiple'=>'')) !!}
                    <p>
                        <small>You can assign beneficiary to the above data officers. </small>
                    </p>
                </div>
              <!--  <p class="bg-navy disabled color-palette">{{trans_choice('general.login',2)}} {{trans_choice('general.detail',2)}}</p>
                <div class="form-group">
                    {!! Form::label('username',trans_choice('general.username',1),array('class'=>'')) !!}
                    {!! Form::text('username',$beneficiary->username, array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password',trans_choice('general.password',1),array('class'=>'')) !!}
                    {!! Form::password('password', array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('repeatpassword',trans_choice('general.repeat_password',1),array('class'=>'')) !!}
                    {!! Form::password('repeatpassword', array('class' => 'form-control', 'placeholder'=>"")) !!}
                </div>
              -->
                <p class="bg-navy disabled color-palette">{{trans_choice('general.custom_field',2)}}</p>
                @foreach($custom_fields as $key)

                    <div class="form-group">
                        {!! Form::label($key->id,$key->name,array('class'=>'')) !!}
                        @if($key->field_type=="number")
                            <input type="number" class="form-control" name="{{$key->id}}"
                                   @if($key->required==1) required
                                   @endif value="@if(!empty(\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first())){{\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first()->name}} @endif">
                        @endif
                        @if($key->field_type=="textfield")
                            <input type="text" class="form-control" name="{{$key->id}}"
                                   @if($key->required==1) required
                                   @endif value="@if(!empty(\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first())){{\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first()->name}} @endif">
                        @endif
                        @if($key->field_type=="date")
                            <input type="text" class="form-control date-picker" name="{{$key->id}}"
                                   @if($key->required==1) required
                                   @endif value="@if(!empty(\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first())){{\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first()->name}} @endif">
                        @endif
                        @if($key->field_type=="textarea")
                            <textarea class="form-control" name="{{$key->id}}"
                                      @if($key->required==1) required @endif>@if(!empty(\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first())){{\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first()->name}} @endif</textarea>
                        @endif
                        @if($key->field_type=="decimal")
                            <input type="text" class="form-control touchspin" name="{{$key->id}}"
                                   @if($key->required==1) required
                                   @endif value="@if(!empty(\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first())){{\App\Models\CustomFieldMeta::where('custom_field_id',$key->id)->where('parent_id',$beneficiary->id)->where('category','beneficiarys')->first()->name}} @endif">
                        @endif

                    </div>
                @endforeach
                <p style="text-align:center; font-weight:bold;">
                    <small><a href="{{url('custom_field/create')}}" target="_blank">Click here to add custom fields
                            on this page</a></small>
                </p>

            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right">{{trans_choice('general.save',2)}}</button>
        </div>
        {!! Form::close() !!}
    </div>
    <!-- /.box -->
@endsection

@section('footer-scripts')
    <script>
        function delete_file(e) {
            var id = e.id;
            swal({
                title: 'Are you sure?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Cancel'
            }).then(function () {
                $.ajax({
                    type: 'GET',
                    url: "{!!  url('beneficiary/'.$beneficiary->id) !!}/delete_file?id=" + id,
                    success: function (data) {
                        $("#file_" + id + "_span").remove();
                        swal({
                            title: 'Deleted',
                            text: 'File successfully deleted',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            timer: 2000
                        })
                    }
                });
            })

        }
    </script>
@endsection
