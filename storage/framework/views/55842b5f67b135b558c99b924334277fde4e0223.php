<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.other_income',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.other_income',1)); ?> </h3>

            <div class="box-tools pull-right">
                <?php if(Sentinel::hasAccess('other_income.create')): ?>
                    <a href="<?php echo e(url('other_income/create')); ?>"
                       class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.other_income',1)); ?> </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-body">
            <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-condensed table-hover">
                    <thead>
                    <tr>
                        <th><?php echo e(trans_choice('general.income',1)); ?> <?php echo e(trans_choice('general.type',1)); ?></th>
                        <th><?php echo e(trans_choice('general.amount',1)); ?></th>
                        <th><?php echo e(trans_choice('general.date',1)); ?></th>
                        <th><?php echo e(trans_choice('general.description',1)); ?></th>
                        <th><?php echo e(trans_choice('general.file',2)); ?></th>
                        <th><?php echo e(trans_choice('general.action',1)); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $key): ?>
                        <tr>
                            <td>
                                <?php if(!empty($key->other_income_type)): ?>
                                    <?php echo e($key->other_income_type->name); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e(number_format($key->amount,2)); ?></td>
                            <td><?php echo e($key->date); ?></td>

                            <td><?php echo e($key->notes); ?></td>
                            <td>
                                <ul class="">
                                    <?php foreach(unserialize($key->files) as $k=>$value): ?>
                                        <li><a href="<?php echo asset('uploads/'.$value); ?>"
                                               target="_blank"><?php echo $value; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-flat dropdown-toggle"
                                            data-toggle="dropdown" aria-expanded="false">
                                        <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu">
                                        <?php if(Sentinel::hasAccess('other_income.update')): ?>
                                            <li><a href="<?php echo e(url('other_income/'.$key->id.'/edit')); ?>"><i
                                                            class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::hasAccess('other_income.delete')): ?>
                                            <li><a href="<?php echo e(url('other_income/'.$key->id.'/delete')); ?>"
                                                   class="delete"><i
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
            "displayLength": 15,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [[2, "desc"]],
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