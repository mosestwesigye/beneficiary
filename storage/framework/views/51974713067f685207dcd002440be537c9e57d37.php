<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.add')); ?> <?php echo e(trans_choice('general.role',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans('general.add')); ?> <?php echo e(trans_choice('general.role',1)); ?></h3>

        </div>
        <?php echo Form::open(array('url' => 'user/role/store','class'=>'',"enctype" => "multipart/form-data")); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-line">
                            <?php echo Form::label(trans_choice('general.name',1) ,null,array('class'=>'control-label')); ?>

                            <?php echo Form::text('name',null,array('class'=>'form-control')); ?>

                        </div>
                    </div>
                    <div class="form-group">
                        <hr>
                        <h4><?php echo e(trans_choice('general.manage',1)); ?> <?php echo e(trans_choice('general.permission',2)); ?></h4>

                        <div class="col-md-6">
                            <table class="table table-stripped table-hover">
                                <?php foreach($data as $permission): ?>
                                    <tr>
                                        <td>
                                            <?php if($permission->parent_id==0): ?>
                                                <strong><?php echo e($permission->name); ?></strong>
                                            <?php else: ?>
                                                <?php echo e($permission->name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if(!empty($permission->description)): ?>
                                                <i class="fa fa-info" data-toggle="tooltip"
                                                   data-original-title="<?php echo e($permission->description); ?>"></i>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <input type="checkbox" data-parent="<?php echo e($permission->parent_id); ?>"
                                                   name="permission[]" value="<?php echo e($permission->slug); ?>"
                                                   id="<?php echo e($permission->id); ?>"
                                                   class="form-control pcheck">
                                            <label class="" for="<?php echo e($permission->id); ?>">

                                            </label>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <script>
        $(document).ready(function () {
            $(".pcheck").on('ifChecked', function (e) {
                if ($(this).attr('data-parent') == 0) {
                    var id = $(this).attr('id');
                    $(":checkbox[data-parent=" + id + "]").iCheck('check');

                }
            });
            $(".pcheck").on('ifUnchecked', function (e) {
                if ($(this).attr('data-parent') == 0) {
                    var id = $(this).attr('id');
                    $(":checkbox[data-parent=" + id + "]").iCheck('uncheck');

                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>