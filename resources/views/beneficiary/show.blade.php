@extends('layouts.master')
@section('title')
    {{trans_choice('general.beneficiary',1)}} {{trans_choice('general.detail',2)}}
@endsection
@section('content')
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-3">
                    <div class="user-block">
                        @if(!empty($beneficiary->photo))
                            <a href="{{asset('uploads/'.$beneficiary->photo)}}" class="fancybox"> <img class="img-circle"
                                 src="{{asset('uploads/'.$beneficiary->photo)}}"
                                 alt="user image"/></a>
                        @else
                            <img class="img-circle"
                                 src="{{asset('assets/dist/img/user.png')}}"
                                 alt="user image"/>
                        @endif
                        <span class="username">
                                {{$beneficiary->title}}
                            . {{$beneficiary->first_name}} {{$beneficiary->last_name}}
                            </span>
                        <span class="description" style="font-size:13px; color:#000000">{{$beneficiary->unique_number}}
                            <br>
                                <a href="{{url('beneficiary/'.$beneficiary->id.'/edit')}}">{{trans_choice('general.edit',1)}}</a><br>
                            {{$beneficiary->business_name}}, {{$beneficiary->working_status}}
                            <br>{{$beneficiary->gender}}
                            , {{date("Y-m-d")-$beneficiary->dob}} {{trans_choice('general.year',2)}}
                            </span>
                    </div>
                    <!-- /.user-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b>{{trans_choice('general.address',1)}}:</b> {{$beneficiary->address}}</li>
                        <li><b>{{trans_choice('general.city',2)}}:</b> {{$beneficiary->city}}</li>
                        <li><b>{{trans_choice('general.zone',2)}}:</b> {{$beneficiary->zone}}</li>
                        <li><b>{{trans_choice('general.village',2)}}:</b> {{$beneficiary->village}}</li>
                        <li><b>{{trans_choice('general.place_of_residence',2)}}:</b> {{$beneficiary->place_of_residence}}</li>
                        <li><b>{{trans_choice('general.branch',2)}}:</b> {{$beneficiary->branch_id}}</li>
                        <li><b>{{trans_choice('general.blacklisted',1)}}:</b>
                            @if($beneficiary->blacklisted==1)
                                <span class="label label-danger">{{trans_choice('general.yes',1)}}</span>
                            @else
                                <span class="label label-success">{{trans_choice('general.no',1)}}</span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b>{{trans_choice('general.spouse_name',1)}}:</b> {{$beneficiary->spouse_name}}</li>
                        <li><b>{{trans_choice('general.spouse_contact',1)}}:</b> {{$beneficiary->spouse_contact}}</li>
                        <li><b>{{trans_choice('general.email',1)}}:</b> <a
                                    onclick="javascript:window.open('mailto:{{$beneficiary->email}}', 'mail');event.preventDefault()"
                                    href="mailto:{{$beneficiary->email}}">{{$beneficiary->email}}</a>

                            <div class="btn-group-horizontal"><a type="button" class="btn-xs bg-red"
                                                                 href="{{url('communication/email/create?beneficiary_id='.$beneficiary->id)}}">{{trans_choice('general.send',1)}}
                                    {{trans_choice('general.email',1)}}</a></div>
                        </li>
                        <li><b>{{trans_choice('general.mobile',1)}}:</b> {{$beneficiary->mobile}}
                            <div class="btn-group-horizontal"><a type="button" class="btn-xs bg-red"
                                                                 href="{{url('communication/sms/create?beneficiary_id='.$beneficiary->id)}}">{{trans_choice('general.send',1)}}
                                    {{trans_choice('general.sms',1)}}</a></div>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b>{{trans_choice('general.ratio_id',1)}}:</b> {{$beneficiary->ratio_id}}</li>
                        <li><b>{{trans_choice('general.national_id',1)}}:</b> {{$beneficiary->national_id}}</li>
                        <li><b>{{trans_choice('general.arrival_date',1)}}:</b> {{$beneficiary->arrival_date}}</li>
                        <li><b>{{trans_choice('general.number_dependants',1)}}:</b> {{$beneficiary->number_dependants}}</li>
                        <li><b>{{trans_choice('general.bank',1)}}:</b> {{$beneficiary->bank}}</li>
                        <li><b>{{trans_choice('general.account_number',1)}}:</b> {{$beneficiary->account_number}}</li>

                    </ul>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-9">
                    <div class="btn-group-horizontal"><a type="button" class="btn bg-olive margin"
                                                         href="{{url('package/create?beneficiary_id='.$beneficiary->id)}}">{{trans_choice('general.add',1)}}
                            {{trans_choice('general.beneficiary_package',1)}}</a></div>
                </div>
                <div class="col-sm-3">
                    <div class="pull-left">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info dropdown-toggle margin" data-toggle="dropdown">
                                {{trans_choice('general.beneficiary',1)}} {{trans_choice('general.statement',1)}}
                                <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{url('package/'.$beneficiary->id.'/beneficiary_statement/print')}}"
                                       target="_blank">{{trans_choice('general.print',1)}} {{trans_choice('general.statement',1)}}</a>
                                </li>
                                <li>
                                    <a href="{{url('package/'.$beneficiary->id.'/beneficiary_statement/pdf')}}"
                                       target="_blank">{{trans_choice('general.download',1)}} {{trans_choice('general.in',1)}} {{trans_choice('general.pdf',1)}}</a>
                                </li>
                                <li>
                                    <a href="{{url('package/'.$beneficiary->id.'/beneficiary_statement/email')}}">{{trans_choice('general.email',1)}}
                                        {{trans_choice('general.statement',1)}}</a></li>
                            <!--<li>
                                    <a href="{{url('package/'.$beneficiary->id.'/beneficiary_statement/excel')}}"
                                       target="_blank">{{trans_choice('general.download',1)}} {{trans_choice('general.in',1)}} {{trans_choice('general.excel',1)}}</a></li>

                                <li>
                                    <a href="{{url('package/'.$beneficiary->id.'/beneficiary_statement/csv')}}"
                                       target="_blank">{{trans_choice('general.download',1)}} {{trans_choice('general.in',1)}} {{trans_choice('general.csv',1)}}</a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans_choice('general.beneficiary_package',2)}}</h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body table-responsive ">
            <table id="beneficiary-package" class="table table-bordered table-condensed table-hover">
                <thead>
                <tr style="background-color: #D1F9FF">
                    <th>#</th>
                    <th>{{trans_choice('general.beneficiary',1)}}</th>
                    <th>{{trans_choice('general.branch',1)}}</th>
                    <th>{{trans_choice('general.item',1)}}#</th>
                    <th>{{trans_choice('general.quantity',1)}}#</th>
                    <th>{{trans_choice('general.unit',1)}}#</th>
                    <th>{{trans_choice('general.mode_of_payment',1)}}</th>
                    <th>{{trans_choice('general.package_amount',1)}}</th>
                    <th>{{trans_choice('general.status',1)}}</th>
                    <th>{{ trans_choice('general.action',1) }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($beneficiary->packages as $key)
                    <tr>
                      <td>{{ $key->id }}</td>
                      <td>
                       @if(!empty($key->beneficiary->packages))
                           <a href="{{url('beneficiary/'.$key->beneficiary_id.'/show')}}">{{$key->beneficiary->first_name}} {{$key->beneficiary->last_name}}</a>
                       @else
                           <span class="label label-danger">{{trans_choice('general.broken',1)}} <i
                                       class="fa fa-exclamation-triangle"></i> </span>
                       @endif
                       {{ $key->name }}
                   </td>
                      <td>{{ $key->branch_id }}</td>
                      <td>{{ $key->item }}</td>
                      <td>{{ $key->quantity }}</td>
                      <td>{{ $key->unit }}</td>
                      <td>{{ $key->mode_of_payment }}</td>
                      <td>{{ $key->package_amount }}</td>

                        <td>
                            @if($key->active==1)
                                <span class="label label-success">{{trans_choice('general.active',1)}}</span>
                            @endif
                            @if($key->active==0)
                                <span class="label label-danger">{{trans_choice('general.pending',1)}}</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    {{ trans('general.choose') }} <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    @if($key->active==0)
                                        @if(Sentinel::hasAccess('packages.approve'))
                                            <li><a href="{{ url('package/'.$key->id.'/approve') }}"><i
                                                            class="fa fa-check"></i> {{trans_choice('general.approve',1)}}
                                                </a></li>
                                        @endif
                                    @endif
                                    @if($key->active==1)
                                        @if(Sentinel::hasAccess('packages.approve'))
                                            <li><a href="{{ url('package/'.$key->id.'/decline') }}"><i
                                                            class="fa fa-minus-circle"></i> {{trans_choice('general.decline',1)}}
                                                </a></li>
                                        @endif
                                    @endif
                                    @if(Sentinel::hasAccess('packages.blacklist'))
                                        @if($key->blacklisted==1)
                                            <li><a href="{{ url('package/'.$key->id.'/unblacklist') }}"
                                                   class="delete"><i
                                                            class="fa fa-check"></i>{{trans_choice('general.undo',1)}} {{trans_choice('general.blacklist',1)}}
                                                </a>
                                            </li>
                                        @endif
                                        @if($key->blacklisted==0)
                                            <li>
                                                <a href="{{ url('package/'.$key->id.'/blacklist') }}"
                                                   class="delete"><i
                                                            class="fa fa-minus-circle"></i> {{trans_choice('general.blacklist',1)}}
                                                </a>
                                            </li>
                                        @endif
                                    @endif
                                    @if(Sentinel::hasAccess('packages.view'))
                                        <li><a href="{{ url('package/'.$key->id.'/show') }}"><i
                                                        class="fa fa-search"></i> {{trans_choice('general.detail',2)}}
                                            </a></li>
                                    @endif
                                    @if(Sentinel::hasAccess('packages.update'))
                                        <li><a href="{{ url('package/'.$key->id.'/edit') }}"><i
                                                        class="fa fa-edit"></i> {{ trans('general.edit') }} </a>
                                        </li>
                                    @endif
                                    @if(Sentinel::hasAccess('packages.delete'))
                                        <li><a href="{{ url('package/'.$key->id.'/delete') }}" class="delete"><i
                                                        class="fa fa-trash"></i> {{ trans('general.delete') }} </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




    <!--
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{trans_choice('general.repayment',2)}}</h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="view-repayments"
                   class="table table-bordered table-condensed table-hover dataTable no-footer">
                <thead>
                <tr style="background-color: #D1F9FF" role="row">
                    <th>
                        {{trans_choice('general.collection',1)}} {{trans_choice('general.date',1)}}
                    </th>
                    <th>
                        {{trans_choice('general.collected_by',1)}}
                    </th>
                    <th>
                        {{trans_choice('general.method',1)}}
                    </th>
                    <th>
                        {{trans_choice('general.amount',1)}}
                    </th>
                    <th>
                        {{trans_choice('general.action',1)}}
                    </th>
                    <th>
                        {{trans_choice('general.receipt',1)}}
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($beneficiary->payments as $key)


                    <tr>
                        <td>{{$key->collection_date}}</td>
                        <td>
                            @if(!empty($key->user))
                                {{$key->user->first_name}} {{$key->user->last_name}}
                            @endif
                        </td>
                        <td>
                            @if(!empty($key->package_repayment_method))
                                {{$key->package_repayment_method->name}}
                            @endif
                        </td>
                        <td>${{round($key->amount,2)}}</td>
                        <td>
                            <div class="btn-group-horizontal">
                                <a type="button" class="btn bg-white btn-xs text-bold"
                                   href="{{url('package/'.$key->package_id.'/repayment/'.$key->id.'/edit')}}">{{trans_choice('general.edit',1)}}</a>
                                <a type="button"
                                   class="btn bg-white btn-xs text-bold deletePayment"
                                   href="{{url('package/'.$key->package_id.'/repayment/'.$key->id.'/delete')}}"
                                >{{trans_choice('general.delete',1)}}</a>
                            </div>
                        </td>
                        <td>
                            <a type="button" class="btn btn-default btn-xs"
                               href="{{url('package/'.$key->package_id.'/repayment/'.$key->id.'/print')}}"
                               target="_blank">
                                                                <span class="glyphicon glyphicon-print"
                                                                      aria-hidden="true"></span>
                            </a>
                            <a type="button" class="btn btn-default btn-xs"
                               href="{{url('package/'.$key->package_id.'/repayment/'.$key->id.'/pdf')}}"
                               target="_blank">
                                                                <span class="glyphicon glyphicon-file"
                                                                      aria-hidden="true"></span>
                            </a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div> -->
@endsection
@section('footer-scripts')
    <script src="{{ asset('assets/plugins/datatable/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/media/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/extensions/Buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/extensions/Buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/extensions/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/datatable/extensions/Buttons/js/buttons.colVis.min.js')}}"></script>

    <script>
        $('#beneficiary-package').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', 'text': '{{ trans('general.copy') }}'},
                {extend: 'excel', 'text': '{{ trans('general.excel') }}'},
                {extend: 'pdf', 'text': '{{ trans('general.pdf') }}'},
                {extend: 'print', 'text': '{{ trans('general.print') }}'},
                {extend: 'csv', 'text': '{{ trans('general.csv') }}'},
                {extend: 'colvis', 'text': '{{ trans('general.colvis') }}'}
            ],
            "paging": true,
            "lengthChange": true,
            "displayLength": 15,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [[0, "asc"]],
            "columnDefs": [
                {"orderable": false, "targets": [5]}
            ],
            "language": {
                "lengthMenu": "{{ trans('general.lengthMenu') }}",
                "zeroRecords": "{{ trans('general.zeroRecords') }}",
                "info": "{{ trans('general.info') }}",
                "infoEmpty": "{{ trans('general.infoEmpty') }}",
                "search": "{{ trans('general.search') }}",
                "infoFiltered": "{{ trans('general.infoFiltered') }}",
                "paginate": {
                    "first": "{{ trans('general.first') }}",
                    "last": "{{ trans('general.last') }}",
                    "next": "{{ trans('general.next') }}",
                    "previous": "{{ trans('general.previous') }}"
                }
            },
            responsive: false
        });
    </script>

@endsection
