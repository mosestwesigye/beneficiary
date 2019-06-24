<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.application',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.application',2)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="data-table" class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr style="background-color: #D1F9FF">
                    <th><?php echo e(trans_choice('general.borrower',1)); ?></th>
                    <th>#</th>
                    <th><?php echo e(trans_choice('general.product',1)); ?></th>
                    <th><?php echo e(trans_choice('general.amount',1)); ?></th>
                    <th><?php echo e(trans_choice('general.status',1)); ?></th>
                    <th><?php echo e(trans_choice('general.guarantor',2)); ?></th>
                    <th><?php echo e(trans_choice('general.note',2)); ?></th>
                    <th><?php echo e(trans_choice('general.date',1)); ?></th>
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
                        </td>
                        <td><?php echo e($key->id); ?></td>
                        <td>
                            <?php if(!empty($key->loan_product)): ?>
                                <a href="<?php echo e(url('loan/loan_product/'.$key->loan_product_id.'/edit')); ?>"><?php echo e($key->loan_product->name); ?></a>
                            <?php else: ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.broken',1)); ?> <i
                                            class="fa fa-exclamation-triangle"></i> </span>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e(round($key->amount,2)); ?></td>
                        <td>
                            <?php if($key->status=='declined'): ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.declined',1)); ?></span>
                            <?php endif; ?>
                            <?php if($key->status=='approved'): ?>
                                <span class="label label-success"><?php echo e(trans_choice('general.approved',1)); ?></span>
                            <?php endif; ?>
                            <?php if($key->status=='pending'): ?>
                                <span class="label label-warning"><?php echo e(trans_choice('general.pending',1)); ?></span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php foreach($key->guarantors as $guarantor): ?>
                                <?php if(!empty($guarantor->guarantee)): ?>
                                    <a href="<?php echo e(url('borrower/'.$guarantor->guarantor_id.'/show')); ?>"><?php echo e($guarantor->guarantee->first_name); ?> <?php echo e($guarantor->guarantee->last_name); ?>

                                        -<?php echo e($guarantor->amount); ?></a><br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </td>
                        <td><?php echo $key->notes; ?></td>
                        <td><?php echo $key->created_at; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">

                                    <?php if($key->status=='pending' || $key->status=="declined"): ?>
                                        <?php if(Sentinel::hasAccess('loans.create')): ?>
                                            <li><a href="<?php echo e(url('loan/loan_application/'.$key->id.'/approve')); ?>"><i
                                                            class="fa fa-check"></i> <?php echo e(trans('general.approve')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if( $key->status=="pending"): ?>
                                        <?php if(Sentinel::hasAccess('loans.update')): ?>
                                            <li><a href="<?php echo e(url('loan/loan_application/'.$key->id.'/decline')); ?>"><i
                                                            class="fa fa-minus-circle"></i> <?php echo e(trans('general.decline')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('loans.delete')): ?>
                                        <li><a href="<?php echo e(url('loan/loan_application/'.$key->id.'/delete')); ?>"
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
            "order": [[7, "desc"]],
            "columnDefs": [
                {"orderable": false, "targets": [8]}
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