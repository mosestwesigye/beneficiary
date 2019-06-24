<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.asset',1)); ?> <?php echo e(trans_choice('general.type',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.asset',1)); ?> <?php echo e(trans_choice('general.type',2)); ?></h3>

            <div class="box-tools pull-right">
                <a href="<?php echo e(url('asset/type/create')); ?>"
                   class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.type',1)); ?></a>
            </div>
        </div>
        <div class="box-body">
            <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><?php echo e(trans_choice('general.name',1)); ?></th>
                    <th><?php echo e(trans_choice('general.type',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td><?php echo e($key->name); ?></td>
                        <td>
                            <?php if($key->type=="current"): ?>
                                <?php echo e(trans_choice('general.current',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            <?php endif; ?>
                            <?php if($key->type=="fixed"): ?>
                                <?php echo e(trans_choice('general.fixed',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            <?php endif; ?>
                            <?php if($key->type=="intangible"): ?>
                                <?php echo e(trans_choice('general.intangible',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            <?php endif; ?>
                            <?php if($key->type=="investment"): ?>
                                <?php echo e(trans_choice('general.investment',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            <?php endif; ?>
                            <?php if($key->type=="other"): ?>
                                <?php echo e(trans_choice('general.other',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-flat dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(url('asset/type/'.$key->id.'/edit')); ?>"><i
                                                    class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a></li>
                                    <li><a href="<?php echo e(url('asset/type/'.$key->id.'/delete')); ?>"
                                           class="delete"><i
                                                    class="fa fa-trash"></i> <?php echo e(trans('general.delete')); ?> </a></li>
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
    <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
    <script>
        $('#data-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
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
                    {"orderable": false, "targets": 2}
                ]
            },
        });
        $(document).ready(function () {
            $('.deleteType').on('click', function (e) {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>