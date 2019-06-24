<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.role',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.role',2)); ?></h3>

            <div class="box-tools pull-right">
                <a href="<?php echo e(url('user/role/create')); ?>" class="btn btn-info btn-xs">
                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.role',1)); ?>

                </a>
            </div>
        </div>
        <div class="box-body">
            <table class="table responsive table-bordered table-hover table-stripped" id="">
                <thead>
                <tr>
                    <th><?php echo e(trans_choice('general.name',1)); ?></th>
                    <th><?php echo e(trans('general.slug')); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>

                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td><?php echo e($key->name); ?></td>
                        <td><?php echo e($key->slug); ?></td>
                        <td>
                            <div class="btn-group">

                                <button class="btn bg-blue btn-xs dropdown-toggle" type="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"><?php echo e(trans_choice('general.choose',1)); ?> <i
                                            class="fa fa-angle-down"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(url('user/role/'.$key->id.'/edit')); ?>"><i
                                                    class="fa fa-edit"></i>
                                            <?php echo e(trans('general.edit')); ?></a>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(url('user/role/'.$key->id.'/delete')); ?>"
                                           class="delete"><i
                                                    class="fa fa-trash"></i>
                                            <?php echo e(trans('general.delete')); ?></a>
                                    </li>
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

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>