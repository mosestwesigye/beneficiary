@extends('layouts.master')
@section('title')
    {{ $beneficiary_group->name }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $beneficiary_group->name }}</h3>

                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    {!! $beneficiary_group->notes !!}
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {{ trans_choice('general.created_at',1) }}: {{$beneficiary_group->created_at}}
                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans_choice('general.beneficiary',2) }}</h3>

                    <div class="box-tools pull-right">
                        @if(Sentinel::hasAccess('beneficiaries.groups'))
                            <a href="#" data-toggle="modal" data-target="#addbeneficiary"
                               class="btn btn-info btn-sm">{{trans_choice('general.add',1)}} {{trans_choice('general.beneficiary',1)}}</a>
                        @endif
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered table-condensed table-hover">
                            <thead>
                            <tr style="background-color: #D1F9FF">
                                <th>{{trans_choice('general.full_name',1)}}</th>
                                <th>{{trans_choice('general.unique',1)}}#</th>
                                <th>{{trans_choice('general.mobile',1)}}</th>

                                <th>{{ trans_choice('general.action',1) }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($beneficiary_group->members as $key)
                                @if(!empty($key->beneficiary))
                                    <tr>
                                        <td>{{ $key->beneficiary->first_name }} {{ $key->beneficiary->last_name }}</td>
                                        <td>{{ $key->beneficiary->unique_number }}</td>
                                        <td>{{ $key->beneficiary->mobile }}</td>
                                      
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    {{ trans('general.choose') }} <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    @if(Sentinel::hasAccess('beneficiaries.view'))
                                                        <li><a href="{{ url('beneficiary/'.$key->beneficiary->id.'/show') }}"><i
                                                                        class="fa fa-search"></i> {{trans_choice('general.detail',2)}}
                                                            </a></li>
                                                    @endif
                                                    @if(Sentinel::hasAccess('beneficiaries.update'))
                                                        <li><a href="{{ url('beneficiary/'.$key->beneficiary->id.'/edit') }}"><i
                                                                        class="fa fa-edit"></i> {{ trans('general.edit') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if(Sentinel::hasAccess('beneficiaries.groups'))
                                                        <li>
                                                            <a href="{{ url('beneficiary/group/'.$key->id.'/remove_beneficiary') }}"
                                                               class="delete"><i
                                                                        class="fa fa-trash"></i> {{ trans('general.remove') }}
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="modal fade" id="addbeneficiary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">*</span></button>
                    <h4 class="modal-title">{{trans_choice('general.add',1)}} {{trans_choice('general.beneficiary',1)}}</h4>
                </div>
                {!! Form::open(array('url' => url('beneficiary/group/'.$beneficiary_group->id.'/add_beneficiary'),'method'=>'post')) !!}
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            {!!  Form::label('beneficiary_id',trans_choice('general.beneficiary',1),array('class'=>' control-label')) !!}
                            {!! Form::select('beneficiary_id',$beneficiaries,null,array('class'=>' select2','placeholder'=>trans_choice('general.select',1),'required'=>'required')) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">{{trans_choice('general.save',1)}}</button>
                    <button type="button" class="btn default"
                            data-dismiss="modal">{{trans_choice('general.close',1)}}</button>
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
