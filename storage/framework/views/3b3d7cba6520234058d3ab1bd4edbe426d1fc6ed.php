<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.detail',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-widget">
        <div class="box-header with-border">
            <div class="row">
                <div class="col-sm-3">
                    <div class="user-block">
                        <?php if(!empty($beneficiary->photo)): ?>
                            <a href="<?php echo e(asset('uploads/'.$beneficiary->photo)); ?>" class="fancybox"> <img class="img-circle"
                                 src="<?php echo e(asset('uploads/'.$beneficiary->photo)); ?>"
                                 alt="user image"/></a>
                        <?php else: ?>
                            <img class="img-circle"
                                 src="<?php echo e(asset('assets/dist/img/user.png')); ?>"
                                 alt="user image"/>
                        <?php endif; ?>
                        <span class="username">
                                <?php echo e($beneficiary->title); ?>

                            . <?php echo e($beneficiary->first_name); ?> <?php echo e($beneficiary->last_name); ?>

                            </span>
                        <span class="description" style="font-size:13px; color:#000000"><?php echo e($beneficiary->unique_number); ?>

                            <br>
                                <a href="<?php echo e(url('beneficiary/'.$beneficiary->id.'/edit')); ?>"><?php echo e(trans_choice('general.edit',1)); ?></a><br>
                            <?php echo e($beneficiary->business_name); ?>, <?php echo e($beneficiary->working_status); ?>

                            <br><?php echo e($beneficiary->gender); ?>

                            , <?php echo e(date("Y-m-d")-$beneficiary->dob); ?> <?php echo e(trans_choice('general.year',2)); ?>

                            </span>
                    </div>
                    <!-- /.user-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b><?php echo e(trans_choice('general.address',1)); ?>:</b> <?php echo e($beneficiary->address); ?></li>
                        <li><b><?php echo e(trans_choice('general.city',2)); ?>:</b> <?php echo e($beneficiary->city); ?></li>
                        <li><b><?php echo e(trans_choice('general.zone',2)); ?>:</b> <?php echo e($beneficiary->zone); ?></li>
                        <li><b><?php echo e(trans_choice('general.village',2)); ?>:</b> <?php echo e($beneficiary->village); ?></li>
                        <li><b><?php echo e(trans_choice('general.place_of_residence',2)); ?>:</b> <?php echo e($beneficiary->place_of_residence); ?></li>
                        <li><b><?php echo e(trans_choice('general.branch',2)); ?>:</b> <?php echo e($beneficiary->branch_id); ?></li>
                        <li><b><?php echo e(trans_choice('general.blacklisted',1)); ?>:</b>
                            <?php if($beneficiary->blacklisted==1): ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.yes',1)); ?></span>
                            <?php else: ?>
                                <span class="label label-success"><?php echo e(trans_choice('general.no',1)); ?></span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b><?php echo e(trans_choice('general.spouse_name',1)); ?>:</b> <?php echo e($beneficiary->spouse_name); ?></li>
                        <li><b><?php echo e(trans_choice('general.spouse_contact',1)); ?>:</b> <?php echo e($beneficiary->spouse_contact); ?></li>
                        <li><b><?php echo e(trans_choice('general.email',1)); ?>:</b> <a
                                    onclick="javascript:window.open('mailto:<?php echo e($beneficiary->email); ?>', 'mail');event.preventDefault()"
                                    href="mailto:<?php echo e($beneficiary->email); ?>"><?php echo e($beneficiary->email); ?></a>

                            <div class="btn-group-horizontal"><a type="button" class="btn-xs bg-red"
                                                                 href="<?php echo e(url('communication/email/create?beneficiary_id='.$beneficiary->id)); ?>"><?php echo e(trans_choice('general.send',1)); ?>

                                    <?php echo e(trans_choice('general.email',1)); ?></a></div>
                        </li>
                        <li><b><?php echo e(trans_choice('general.mobile',1)); ?>:</b> <?php echo e($beneficiary->mobile); ?>

                            <div class="btn-group-horizontal"><a type="button" class="btn-xs bg-red"
                                                                 href="<?php echo e(url('communication/sms/create?beneficiary_id='.$beneficiary->id)); ?>"><?php echo e(trans_choice('general.send',1)); ?>

                                    <?php echo e(trans_choice('general.sms',1)); ?></a></div>
                        </li>

                    </ul>
                </div>
                <div class="col-sm-3">
                    <ul class="list-unstyled">
                        <li><b><?php echo e(trans_choice('general.ratio_id',1)); ?>:</b> <?php echo e($beneficiary->ratio_id); ?></li>
                        <li><b><?php echo e(trans_choice('general.national_id',1)); ?>:</b> <?php echo e($beneficiary->national_id); ?></li>
                        <li><b><?php echo e(trans_choice('general.arrival_date',1)); ?>:</b> <?php echo e($beneficiary->arrival_date); ?></li>
                        <li><b><?php echo e(trans_choice('general.number_dependants',1)); ?>:</b> <?php echo e($beneficiary->number_dependants); ?></li>
                        <li><b><?php echo e(trans_choice('general.bank',1)); ?>:</b> <?php echo e($beneficiary->bank); ?></li>
                        <li><b><?php echo e(trans_choice('general.account_number',1)); ?>:</b> <?php echo e($beneficiary->account_number); ?></li>

                    </ul>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-sm-9">
                    <div class="btn-group-horizontal"><a type="button" class="btn bg-olive margin"
                                                         href="<?php echo e(url('package/create?beneficiary_id='.$beneficiary->id)); ?>"><?php echo e(trans_choice('general.add',1)); ?>

                            <?php echo e(trans_choice('general.beneficiary_package',1)); ?></a></div>
                </div>
                <div class="col-sm-3">
                    <div class="pull-left">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info dropdown-toggle margin" data-toggle="dropdown">
                                <?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.statement',1)); ?>

                                <span class="fa fa-caret-down"></span></button>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="<?php echo e(url('package/'.$beneficiary->id.'/beneficiary_statement/print')); ?>"
                                       target="_blank"><?php echo e(trans_choice('general.print',1)); ?> <?php echo e(trans_choice('general.statement',1)); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('package/'.$beneficiary->id.'/beneficiary_statement/pdf')); ?>"
                                       target="_blank"><?php echo e(trans_choice('general.download',1)); ?> <?php echo e(trans_choice('general.in',1)); ?> <?php echo e(trans_choice('general.pdf',1)); ?></a>
                                </li>
                                <li>
                                    <a href="<?php echo e(url('package/'.$beneficiary->id.'/beneficiary_statement/email')); ?>"><?php echo e(trans_choice('general.email',1)); ?>

                                        <?php echo e(trans_choice('general.statement',1)); ?></a></li>
                            <!--<li>
                                    <a href="<?php echo e(url('package/'.$beneficiary->id.'/beneficiary_statement/excel')); ?>"
                                       target="_blank"><?php echo e(trans_choice('general.download',1)); ?> <?php echo e(trans_choice('general.in',1)); ?> <?php echo e(trans_choice('general.excel',1)); ?></a></li>

                                <li>
                                    <a href="<?php echo e(url('package/'.$beneficiary->id.'/beneficiary_statement/csv')); ?>"
                                       target="_blank"><?php echo e(trans_choice('general.download',1)); ?> <?php echo e(trans_choice('general.in',1)); ?> <?php echo e(trans_choice('general.csv',1)); ?></a></li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.beneficiary_package',2)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body table-responsive ">
            <table id="beneficiary-package" class="table table-bordered table-condensed table-hover">
                <thead>
                <tr style="background-color: #D1F9FF">
                    <th>#</th>
                    <th><?php echo e(trans_choice('general.beneficiary',1)); ?></th>
                    <th><?php echo e(trans_choice('general.branch',1)); ?></th>
                    <th><?php echo e(trans_choice('general.item',1)); ?>#</th>
                    <th><?php echo e(trans_choice('general.quantity',1)); ?>#</th>
                    <th><?php echo e(trans_choice('general.unit',1)); ?>#</th>
                    <th><?php echo e(trans_choice('general.mode_of_payment',1)); ?></th>
                    <th><?php echo e(trans_choice('general.package_amount',1)); ?></th>
                    <th><?php echo e(trans_choice('general.status',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($beneficiary->packages as $key): ?>
                    <tr>
                      <td><?php echo e($key->id); ?></td>
                      <td>
                       <?php if(!empty($key->beneficiary->packages)): ?>
                           <a href="<?php echo e(url('beneficiary/'.$key->beneficiary_id.'/show')); ?>"><?php echo e($key->beneficiary->first_name); ?> <?php echo e($key->beneficiary->last_name); ?></a>
                       <?php else: ?>
                           <span class="label label-danger"><?php echo e(trans_choice('general.broken',1)); ?> <i
                                       class="fa fa-exclamation-triangle"></i> </span>
                       <?php endif; ?>
                       <?php echo e($key->name); ?>

                   </td>
                      <td><?php echo e($key->branch_id); ?></td>
                      <td><?php echo e($key->item); ?></td>
                      <td><?php echo e($key->quantity); ?></td>
                      <td><?php echo e($key->unit); ?></td>
                      <td><?php echo e($key->mode_of_payment); ?></td>
                      <td><?php echo e($key->package_amount); ?></td>

                        <td>
                            <?php if($key->active==1): ?>
                                <span class="label label-success"><?php echo e(trans_choice('general.active',1)); ?></span>
                            <?php endif; ?>
                            <?php if($key->active==0): ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.pending',1)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <?php if($key->active==0): ?>
                                        <?php if(Sentinel::hasAccess('packages.approve')): ?>
                                            <li><a href="<?php echo e(url('package/'.$key->id.'/approve')); ?>"><i
                                                            class="fa fa-check"></i> <?php echo e(trans_choice('general.approve',1)); ?>

                                                </a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if($key->active==1): ?>
                                        <?php if(Sentinel::hasAccess('packages.approve')): ?>
                                            <li><a href="<?php echo e(url('package/'.$key->id.'/decline')); ?>"><i
                                                            class="fa fa-minus-circle"></i> <?php echo e(trans_choice('general.decline',1)); ?>

                                                </a></li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('packages.blacklist')): ?>
                                        <?php if($key->blacklisted==1): ?>
                                            <li><a href="<?php echo e(url('package/'.$key->id.'/unblacklist')); ?>"
                                                   class="delete"><i
                                                            class="fa fa-check"></i><?php echo e(trans_choice('general.undo',1)); ?> <?php echo e(trans_choice('general.blacklist',1)); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($key->blacklisted==0): ?>
                                            <li>
                                                <a href="<?php echo e(url('package/'.$key->id.'/blacklist')); ?>"
                                                   class="delete"><i
                                                            class="fa fa-minus-circle"></i> <?php echo e(trans_choice('general.blacklist',1)); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('packages.view')): ?>
                                        <li><a href="<?php echo e(url('package/'.$key->id.'/show')); ?>"><i
                                                        class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?>

                                            </a></li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('packages.update')): ?>
                                        <li><a href="<?php echo e(url('package/'.$key->id.'/edit')); ?>"><i
                                                        class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('packages.delete')): ?>
                                        <li><a href="<?php echo e(url('package/'.$key->id.'/delete')); ?>" class="delete"><i
                                                        class="fa fa-trash"></i> <?php echo e(trans('general.delete')); ?> </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>




    <!--
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.repayment',2)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="view-repayments"
                   class="table table-bordered table-condensed table-hover dataTable no-footer">
                <thead>
                <tr style="background-color: #D1F9FF" role="row">
                    <th>
                        <?php echo e(trans_choice('general.collection',1)); ?> <?php echo e(trans_choice('general.date',1)); ?>

                    </th>
                    <th>
                        <?php echo e(trans_choice('general.collected_by',1)); ?>

                    </th>
                    <th>
                        <?php echo e(trans_choice('general.method',1)); ?>

                    </th>
                    <th>
                        <?php echo e(trans_choice('general.amount',1)); ?>

                    </th>
                    <th>
                        <?php echo e(trans_choice('general.action',1)); ?>

                    </th>
                    <th>
                        <?php echo e(trans_choice('general.receipt',1)); ?>

                    </th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($beneficiary->payments as $key): ?>


                    <tr>
                        <td><?php echo e($key->collection_date); ?></td>
                        <td>
                            <?php if(!empty($key->user)): ?>
                                <?php echo e($key->user->first_name); ?> <?php echo e($key->user->last_name); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if(!empty($key->package_repayment_method)): ?>
                                <?php echo e($key->package_repayment_method->name); ?>

                            <?php endif; ?>
                        </td>
                        <td>$<?php echo e(round($key->amount,2)); ?></td>
                        <td>
                            <div class="btn-group-horizontal">
                                <a type="button" class="btn bg-white btn-xs text-bold"
                                   href="<?php echo e(url('package/'.$key->package_id.'/repayment/'.$key->id.'/edit')); ?>"><?php echo e(trans_choice('general.edit',1)); ?></a>
                                <a type="button"
                                   class="btn bg-white btn-xs text-bold deletePayment"
                                   href="<?php echo e(url('package/'.$key->package_id.'/repayment/'.$key->id.'/delete')); ?>"
                                ><?php echo e(trans_choice('general.delete',1)); ?></a>
                            </div>
                        </td>
                        <td>
                            <a type="button" class="btn btn-default btn-xs"
                               href="<?php echo e(url('package/'.$key->package_id.'/repayment/'.$key->id.'/print')); ?>"
                               target="_blank">
                                                                <span class="glyphicon glyphicon-print"
                                                                      aria-hidden="true"></span>
                            </a>
                            <a type="button" class="btn btn-default btn-xs"
                               href="<?php echo e(url('package/'.$key->package_id.'/repayment/'.$key->id.'/pdf')); ?>"
                               target="_blank">
                                                                <span class="glyphicon glyphicon-file"
                                                                      aria-hidden="true"></span>
                            </a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div> -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/datatable/media/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/media/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.colVis.min.js')); ?>"></script>

    <script>
        $('#beneficiary-package').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {extend: 'copy', 'text': '<?php echo e(trans('general.copy')); ?>'},
                {extend: 'excel', 'text': '<?php echo e(trans('general.excel')); ?>'},
                {extend: 'pdf', 'text': '<?php echo e(trans('general.pdf')); ?>'},
                {extend: 'print', 'text': '<?php echo e(trans('general.print')); ?>'},
                {extend: 'csv', 'text': '<?php echo e(trans('general.csv')); ?>'},
                {extend: 'colvis', 'text': '<?php echo e(trans('general.colvis')); ?>'}
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
                "lengthMenu": "<?php echo e(trans('general.lengthMenu')); ?>",
                "zeroRecords": "<?php echo e(trans('general.zeroRecords')); ?>",
                "info": "<?php echo e(trans('general.info')); ?>",
                "infoEmpty": "<?php echo e(trans('general.infoEmpty')); ?>",
                "search": "<?php echo e(trans('general.search')); ?>",
                "infoFiltered": "<?php echo e(trans('general.infoFiltered')); ?>",
                "paginate": {
                    "first": "<?php echo e(trans('general.first')); ?>",
                    "last": "<?php echo e(trans('general.last')); ?>",
                    "next": "<?php echo e(trans('general.next')); ?>",
                    "previous": "<?php echo e(trans('general.previous')); ?>"
                }
            },
            responsive: false
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>