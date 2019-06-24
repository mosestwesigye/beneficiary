<?php $__env->startSection('title'); ?><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>-<?php echo e(trans_choice('general.payroll',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>-<?php echo e(trans_choice('general.payroll',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
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
                                    <?php if(Sentinel::hasAccess('payroll.delete')): ?>
                                        <a type="button" class="btn-xs bg-purple"
                                           href="<?php echo e(url('payroll/'.$key->id.'/edit')); ?>"><?php echo e(trans_choice('general.view_modify',1)); ?></a><a
                                                type="button" class="btn-xs bg-navy margin delete"
                                                href="<?php echo e(url('payroll/'.$key->id.'/delete')); ?>"><?php echo e(trans_choice('general.delete',1)); ?></a>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.deletePayroll').on('click', function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
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
                    window.location = href;
                })
            });
        });
    </script>
    <script src="<?php echo e(asset('assets/plugins/datatable/media/js/jquery.dataTables.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/media/js/dataTables.bootstrap.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/js/buttons.colVis.min.js')); ?>"></script>
    <script>

        $('#view-repayments').DataTable({
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
                {"orderable": false, "targets": [6, 7]}
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