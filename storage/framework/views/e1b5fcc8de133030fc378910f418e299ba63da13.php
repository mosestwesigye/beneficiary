<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.user',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.user',2)); ?></h3>

            <div class="box-tools pull-right">
                <?php if(Sentinel::hasAccess('users.create')): ?>
                    <a href="<?php echo e(url('user/create')); ?>" class="btn btn-info btn-xs">
                        <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.user',1)); ?>

                    </a>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table  table-bordered table-hover table-stripped" id="data-table">
                <thead>
                <tr>
                    <th><?php echo e(trans('general.name')); ?></th>
                    <th><?php echo e(trans('general.gender')); ?></th>
                    <th><?php echo e(trans('general.phone')); ?></th>
                    <th><?php echo e(trans_choice('general.email',1)); ?></th>
                    <th><?php echo e(trans('general.address')); ?></th>
                    <th><?php echo e(trans_choice('general.role',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td><?php echo e($key->first_name); ?> <?php echo e($key->last_name); ?></td>
                        <td><?php echo e($key->gender); ?></td>
                        <td><?php echo e($key->phone); ?></td>
                        <td><?php echo e($key->email); ?></td>
                        <td><?php echo $key->address; ?></td>
                        <td>
                            <?php if(!empty($key->roles)): ?>
                                <span class="label label-danger"><?php echo e($key->roles->first()->name); ?> </span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-expanded="false"><?php echo e(trans('general.choose')); ?>...<i
                                            class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if(Sentinel::hasAccess('users.view')): ?>
                                        <li>
                                            <a href="<?php echo e(url('user/'.$key->id.'/show')); ?>"><i
                                                        class="fa fa-search"></i>
                                                <?php echo e(trans('general.detail')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('users.update')): ?>
                                        <li>
                                            <a href="<?php echo e(url('user/'.$key->id.'/edit')); ?>"><i
                                                        class="fa fa-edit"></i>
                                                <?php echo e(trans('general.edit')); ?></a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('users.delete')): ?>
                                        <li>
                                            <a href="<?php echo e(url('user/'.$key->id.'/delete')); ?>"
                                               class="delete"><i
                                                        class="fa fa-trash"></i>
                                                <?php echo e(trans('general.delete')); ?></a>
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
            dom: 'frtip',
            "paging": true,
            "lengthChange": true,
            "displayLength": 15,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [[0, "asc"]],
            "columnDefs": [
                {"orderable": false, "targets": [6]}
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