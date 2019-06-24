<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.loan',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">

                <?php if(isset($_REQUEST['status'])): ?>
                    <?php if($_REQUEST['status']=='pending'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?>  <?php echo e(trans_choice('general.pending',1)); ?> <?php echo e(trans_choice('general.approval',1)); ?>

                    <?php endif; ?>
                    <?php if($_REQUEST['status']=='approved'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?>  <?php echo e(trans_choice('general.awaiting',1)); ?> <?php echo e(trans_choice('general.disbursement',1)); ?>

                    <?php endif; ?>
                        <?php if($_REQUEST['status']=='disbursed'): ?>
                            <?php echo e(trans_choice('general.loan',2)); ?>  <?php echo e(trans_choice('general.disbursed',1)); ?>

                        <?php endif; ?>
                    <?php if($_REQUEST['status']=='declined'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?> <?php echo e(trans_choice('general.declined',1)); ?>

                    <?php endif; ?>
                    <?php if($_REQUEST['status']=='withdrawn'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?> <?php echo e(trans_choice('general.withdrawn',1)); ?>

                    <?php endif; ?>
                    <?php if($_REQUEST['status']=='written_off'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?> <?php echo e(trans_choice('general.written_off',1)); ?>

                    <?php endif; ?>
                    <?php if($_REQUEST['status']=='closed'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?> <?php echo e(trans_choice('general.closed',1)); ?>

                    <?php endif; ?>
                    <?php if($_REQUEST['status']=='pending_reschedule'): ?>
                        <?php echo e(trans_choice('general.loan',2)); ?> <?php echo e(trans_choice('general.pending',1)); ?> <?php echo e(trans_choice('general.reschedule',1)); ?>

                    <?php endif; ?>
                <?php else: ?>
                    <?php echo e(trans_choice('general.all',2)); ?> <?php echo e(trans_choice('general.loan',2)); ?>

                <?php endif; ?>
            </h3>

            <div class="box-tools pull-right">
                <?php if(Sentinel::hasAccess('loans.create')): ?>
                    <a href="<?php echo e(url('loan/create')); ?>"
                       class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.loan',1)); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="data-table" class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr style="background-color: #D1F9FF">
                    <th><?php echo e(trans_choice('general.borrower',1)); ?></th>
                    <th>#</th>
                    <th><?php echo e(trans_choice('general.principal',1)); ?></th>
                    <th><?php echo e(trans_choice('general.released',1)); ?></th>
                    <th><?php echo e(trans_choice('general.interest',1)); ?>%</th>
                    <th><?php echo e(trans_choice('general.due',1)); ?></th>
                    <th><?php echo e(trans_choice('general.paid',1)); ?></th>
                    <th><?php echo e(trans_choice('general.balance',1)); ?></th>
                    <th><?php echo e(trans_choice('general.status',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td>
                            <?php if(!empty($key->borrower)): ?>
                                <a href="<?php echo e(url('borrower/'.$key->borrower_id.'/show')); ?>"><?php echo e($key->borrower->first_name); ?> <?php echo e($key->borrower->last_name); ?></a>
                            <?php else: ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.broken',1)); ?> <i
                                            class="fa fa-exclamation-triangle"></i> </span>
                            <?php endif; ?>
                            <?php echo e($key->name); ?>

                        </td>
                        <td><?php echo e($key->id); ?></td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($key->principal,2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format($key->principal,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td><?php echo e($key->release_date); ?></td>
                        <td>
                            <?php echo e(number_format($key->interest_rate,2)); ?>%/<?php echo e($key->interest_period); ?>

                        </td>
                        <td>
                            <?php if($key->override==1): ?>
                                <s><?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_due_amount($key->id),2)); ?></s><br>
                                <?php echo e(number_format($key->balance,2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_due_amount($key->id),2)); ?>

                            <?php endif; ?>

                        </td>
                        <td><?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_paid($key->id),2)); ?></td>
                        <td>
                            <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_balance($key->id),2)); ?>

                        </td>
                        <td>
                            <?php if($key->maturity_date<date("Y-m-d") && \App\Helpers\GeneralHelper::loan_total_balance($key->id)>0): ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.past_maturity',1)); ?></span>
                            <?php else: ?>
                                <?php if($key->status=='pending'): ?>
                                    <span class="label label-warning"><?php echo e(trans_choice('general.pending',1)); ?> <?php echo e(trans_choice('general.approval',1)); ?></span>
                                <?php endif; ?>
                                    <?php if($key->status=='approved'): ?>
                                        <span class="label label-info"><?php echo e(trans_choice('general.awaiting',1)); ?> <?php echo e(trans_choice('general.disbursement',1)); ?></span>
                                    <?php endif; ?>
                                <?php if($key->status=='disbursed'): ?>
                                    <span class="label label-info"><?php echo e(trans_choice('general.active',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='declined'): ?>
                                    <span class="label label-danger"><?php echo e(trans_choice('general.declined',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='withdrawn'): ?>
                                    <span class="label label-danger"><?php echo e(trans_choice('general.withdrawn',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='written_off'): ?>
                                    <span class="label label-danger"><?php echo e(trans_choice('general.written_off',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='closed'): ?>
                                    <span class="label label-success"><?php echo e(trans_choice('general.closed',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='pending_reschedule'): ?>
                                    <span class="label label-warning"><?php echo e(trans_choice('general.pending',1)); ?> <?php echo e(trans_choice('general.reschedule',1)); ?></span>
                                <?php endif; ?>
                                <?php if($key->status=='rescheduled'): ?>
                                    <span class="label label-info"><?php echo e(trans_choice('general.rescheduled',1)); ?></span>
                                <?php endif; ?>
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
                                    <?php if(Sentinel::hasAccess('loans.view')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/show')); ?>"><i
                                                        class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('loans.create')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/edit')); ?>"><i
                                                        class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a></li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('loans.delete')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/delete')); ?>"
                                               class="delete"><i
                                                        class="fa fa-trash"></i> <?php echo e(trans('general.delete')); ?> </a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
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
        $('#data-table').DataTable({
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
            "displayLength": 25,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [[3, "desc"]],
            "columnDefs": [
                {"orderable": false, "targets": [9]}
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