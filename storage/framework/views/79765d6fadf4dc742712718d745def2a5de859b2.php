<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.custom_field',2)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.custom_field',2)); ?></h3>

            <div class="box-tools pull-right">
                <?php if(Sentinel::hasAccess('custom_fields.create')): ?>
                    <a href="<?php echo e(url('custom_field/create')); ?>"
                       class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.custom_field',2)); ?></a>
                <?php endif; ?>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table id="data-table" class="table table-bordered table-condensed table-hover">
                <thead>
                <tr>
                    <th><?php echo e(trans_choice('general.name',1)); ?></th>
                    <th><?php echo e(trans_choice('general.category',1)); ?></th>
                    <th><?php echo e(trans_choice('general.required',1)); ?> <?php echo e(trans_choice('general.field',1)); ?></th>
                    <th><?php echo e(trans_choice('general.type',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($data as $key): ?>
                    <tr>
                        <td><?php echo e($key->name); ?></td>
                        <td>
                            <?php if($key->category=="borrowers"): ?>
                                <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.borrower',1)); ?>

                            <?php endif; ?>
                            <?php if($key->category=="expenses"): ?>
                                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.expense',1)); ?>

                            <?php endif; ?>
                            <?php if($key->category=="other_income"): ?>
                                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.other_income',1)); ?>

                            <?php endif; ?>
                            <?php if($key->category=="collateral"): ?>
                                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.collateral',1)); ?>

                            <?php endif; ?>
                            <?php if($key->category=="loans"): ?>
                                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.loan',1)); ?>

                            <?php endif; ?>
                            <?php if($key->category=="repayments"): ?>
                                    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.repayment',1)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($key->required==0): ?>
                                <?php echo e(trans_choice('general.no',1)); ?>

                            <?php else: ?>
                                <?php echo e(trans_choice('general.yes',1)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($key->field_type=="number"): ?>
                                <?php echo e(trans_choice('general.number_field',1)); ?>

                            <?php endif; ?>
                            <?php if($key->field_type=="textfield"): ?>
                                    <?php echo e(trans_choice('general.text_field',1)); ?>

                            <?php endif; ?>
                            <?php if($key->field_type=="textarea"): ?>
                                    <?php echo e(trans_choice('general.textarea',1)); ?>

                            <?php endif; ?>
                            <?php if($key->field_type=="decimal"): ?>
                                    <?php echo e(trans_choice('general.decimal_field',1)); ?>

                            <?php endif; ?>
                            <?php if($key->field_type=="date"): ?>
                                    <?php echo e(trans_choice('general.date_field',1)); ?>

                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <?php if(Sentinel::hasAccess('custom_fields.update')): ?>
                                        <li><a href="<?php echo e(url('custom_field/'.$key->id.'/edit')); ?>"><i
                                                        class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a></li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('custom_fields.delete')): ?>
                                        <li><a href="<?php echo e(url('custom_field/'.$key->id.'/delete')); ?>"
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>