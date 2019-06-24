<?php $__env->startSection('title'); ?>
    <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></h3>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-responsive table-hover">
                        <tr>
                            <td><?php echo e(trans('general.gender')); ?></td>
                            <td><?php echo e($user->gender); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans_choice('general.email',1)); ?></td>
                            <td><?php echo e($user->email); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('general.phone')); ?></td>
                            <td><?php echo e($user->phone); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('general.address')); ?></td>
                            <td><?php echo $user->address; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('general.created_at')); ?></td>
                            <td><?php echo e($user->created_at); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('general.updated_at')); ?></td>
                            <td><?php echo e($user->updated_at); ?></td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('general.last_login')); ?></td>
                            <td><?php echo e($user->last_login); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans_choice('general.note',2)); ?></h3>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <?php echo $user->notes; ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans_choice('general.payroll',1)); ?></h3>
                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table id="view-repayments"
                           class="table table-bordered table-condensed table-hover dataTable no-footer">
                        <thead>
                        <tr style="background-color: #D1F9FF" role="row">
                            <th><?php echo e(trans_choice('general.pay',1)); ?> <?php echo e(trans_choice('general.date',1)); ?></th>
                            <th>
                                <?php echo e(trans_choice('general.gross',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>

                            </th>
                            <th>
                                <?php echo e(trans_choice('general.total',1)); ?> <?php echo e(trans_choice('general.deduction',2)); ?>

                            </th>
                            <th>
                                <?php echo e(trans_choice('general.net',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>

                            </th>
                            <th>
                                <?php echo e(trans_choice('general.paid',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>

                            </th>
                            <th><?php echo e(trans_choice('general.recurring',1)); ?></th>
                            <th>
                                <?php echo e(trans_choice('general.payslip',1)); ?>

                            </th>
                            <th>
                                <?php echo e(trans_choice('general.action',1)); ?>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($user->payroll as $key): ?>
                            <tr>
                                <td>
                                    <?php echo e($key->date); ?>

                                </td>
                                <td>
                                    <?php echo e(\App\Helpers\GeneralHelper::single_payroll_total_pay($key->id)); ?>

                                </td>
                                <td>
                                    <?php echo e(\App\Helpers\GeneralHelper::single_payroll_total_deductions($key->id)); ?>

                                </td>
                                <td>
                                    <?php echo e(\App\Helpers\GeneralHelper::single_payroll_total_pay($key->id)-\App\Helpers\GeneralHelper::single_payroll_total_deductions($key->id)); ?>

                                </td>
                                <td><?php echo e($key->paid_amount); ?></td>
                                <td>
                                    <?php if($key->recurring==1): ?>
                                        <?php echo e(trans_choice('general.yes',1)); ?>

                                    <?php else: ?>
                                        <?php echo e(trans_choice('general.no',1)); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <a type="button" class="btn-xs bg-blue"
                                           href="<?php echo e(url('payroll/'.$key->id.'/payslip')); ?>"
                                           target="_blank"><?php echo e(trans_choice('general.generate_payslip',1)); ?></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <a type="button" class="btn-xs bg-purple" href="<?php echo e(url('payroll/'.$key->id.'/edit')); ?>"><?php echo e(trans_choice('general.view_modify',1)); ?></a><a
                                                type="button" class="btn-xs bg-navy margin delete"
                                                href="<?php echo e(url('payroll/'.$key->id.'/delete')); ?>"><?php echo e(trans_choice('general.delete',1)); ?></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $('.data-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
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
                },
                "columnDefs": [
                    {"orderable": false, "targets": 0}
                ]
            },
            responsive: true,
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>