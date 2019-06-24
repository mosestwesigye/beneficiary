<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.payroll',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.payroll',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="view-repayments"
                       class="table table-bordered table-condensed table-hover no-footer">
                    <thead>
                    <tr style="background-color: #D1F9FF" role="row">
                        <th>
                            <?php echo e(trans_choice('general.staff',1)); ?>

                        </th>
                        <th><?php echo e(trans_choice('general.last_pay_date',1)); ?></th>
                        <th>
                            <?php echo e(trans_choice('general.last_gross_amount',1)); ?>

                        </th>
                        <th>
                            <?php echo e(trans_choice('general.last_total_deductions',1)); ?>

                        </th>
                        <th>
                            <?php echo e(trans_choice('general.last_paid_amount',1)); ?>

                        </th>
                        <th>
                            <?php echo e(trans_choice('general.last_payslip',1)); ?>

                        </th>
                        <th>
                            <?php echo e(trans_choice('general.action',1)); ?>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $key): ?>
                        <tr>
                            <td><?php echo e($key->first_name); ?> <?php echo e($key->last_name); ?></td>
                            <?php if(!empty(\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first())): ?>
                                <td>
                                    <?php echo e(\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first()->date); ?>

                                </td>
                                <td>
                                    <?php echo e(\App\Helpers\GeneralHelper::single_payroll_total_pay(\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first()->id)); ?>

                                </td>
                                <td>
                                    <?php echo e(\App\Helpers\GeneralHelper::single_payroll_total_deductions(\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first()->id)); ?>

                                </td>
                                <td><?php echo e(\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first()->paid_amount); ?></td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <a type="button" class="btn-xs bg-blue"
                                           href="<?php echo e(url('payroll/'.\App\Models\Payroll::where('user_id',$key->id)->orderBy('created_at','desc')->first()->id.'/payslip')); ?>"
                                           target="_blank"><?php echo e(trans_choice('general.generate_payslip',1)); ?></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <?php if(Sentinel::hasAccess('payroll.create')): ?>
                                            <a type="button" class="btn-xs bg-navy"
                                               href="<?php echo e(url('payroll/'.$key->id.'/data')); ?>"><?php echo e(trans_choice('general.view_all_payroll',1)); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            <?php else: ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="btn-group-horizontal">
                                        <?php if(Sentinel::hasAccess('payroll.create')): ?>
                                            <a type="button" class="btn-xs bg-navy"
                                               href="<?php echo e(url('payroll/'.$key->id.'/data')); ?>"><?php echo e(trans_choice('general.view_all_payroll',1)); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            <?php endif; ?>
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
            $('.deletePayment').on('click', function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    text: 'If you delete a payment, a fully paid loan may change status to open.',
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
                {"orderable": false, "targets": [5, 6]}
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