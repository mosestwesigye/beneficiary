<?php $__env->startSection('title'); ?> <?php echo e(trans_choice('general.branch',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.branch',2)); ?></h3>

            <div class="box-tools pull-right">
                <a href="<?php echo e(url('branch/create')); ?>"
                   class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.branch',1)); ?></a>
            </div>
        </div>
        <div class="box-body">
            <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th><?php echo e(trans_choice('general.name',1)); ?></th>
                    <th><?php echo e(trans_choice('general.user',2)); ?></th>
                    <th><?php echo e(trans_choice('general.note',2)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td><?php echo e($key->name); ?></td>
                        <td><?php echo e(\App\Models\BranchUser::where('branch_id',$key->id)->count()); ?></td>
                        <td><?php echo $key->notes; ?></td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-flat dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo e(url('branch/'.$key->id.'/show')); ?>"><i
                                                    class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?> </a></li>
                                    <li><a href="<?php echo e(url('branch/'.$key->id.'/edit')); ?>"><i
                                                    class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a></li>
                                    <li><a href="<?php echo e(url('branch/'.$key->id.'/delete')); ?>"
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>