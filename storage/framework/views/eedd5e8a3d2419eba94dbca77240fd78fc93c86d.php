<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.beneficiary',2)); ?> <?php echo e(trans_choice('general.pending',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.beneficiary',2)); ?> <?php echo e(trans_choice('general.pending',1)); ?></h3>

            <div class="box-tools pull-right">
                <?php if(Sentinel::hasAccess('beneficiary.create')): ?>
                    <a href="<?php echo e(url('beneficiary/create')); ?>"
                       class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-body ">
            <div class="table-responsive">
                <table id="data-table" class="table table-bordered table-condensed table-hover">
                    <thead>
                    <tr style="background-color: #D1F9FF">
                        <th><?php echo e(trans_choice('general.full_name',1)); ?></th>
                        <th><?php echo e(trans_choice('general.business',1)); ?></th>
                        <th><?php echo e(trans_choice('general.unique',1)); ?>#</th>
                        <th><?php echo e(trans_choice('general.mobile',1)); ?></th>
                        <th><?php echo e(trans_choice('general.email',1)); ?></th>
                        <th><?php echo e(trans_choice('general.status',1)); ?></th>
                        <th><?php echo e(trans_choice('general.action',1)); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($data as $key): ?>
                        <tr>
                            <td><?php echo e($key->first_name); ?> <?php echo e($key->last_name); ?></td>
                            <td><?php echo e($key->business_name); ?></td>
                            <td><?php echo e($key->unique_number); ?></td>
                            <td><?php echo e($key->mobile); ?></td>
                            <td><?php echo e($key->email); ?></td>
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
                                            <?php if(Sentinel::hasAccess('beneficiaries.approve')): ?>
                                                <li><a href="<?php echo e(url('beneficiary/'.$key->id.'/approve')); ?>"><i
                                                                class="fa fa-check"></i> <?php echo e(trans_choice('general.approve',1)); ?>

                                                    </a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if($key->active==1): ?>
                                            <?php if(Sentinel::hasAccess('beneficiaries.approve')): ?>
                                                <li><a href="<?php echo e(url('beneficiary/'.$key->id.'/decline')); ?>"><i
                                                                class="fa fa-minus-circle"></i> <?php echo e(trans_choice('general.decline',1)); ?>

                                                    </a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Sentinel::hasAccess('beneficiaries.view')): ?>
                                            <li><a href="<?php echo e(url('beneficiary/'.$key->id.'/show')); ?>"><i
                                                            class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?>

                                                </a></li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::hasAccess('beneficiaries.update')): ?>
                                            <li><a href="<?php echo e(url('beneficiary/'.$key->id.'/edit')); ?>"><i
                                                            class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if(Sentinel::hasAccess('beneficiaries.delete')): ?>
                                            <li><a href="<?php echo e(url('beneficiary/'.$key->id.'/delete')); ?>" class="delete"><i
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