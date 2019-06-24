<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?> <?php echo e(trans_choice('general.type',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?> <?php echo e(trans_choice('general.type',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('asset/type/store'), 'method' => 'post', 'class' => 'form-horizontal')); ?>

        <div class="box-body">
            <div class="form-group">
                <?php echo Form::label('name',trans_choice('general.name',1),array('class'=>'col-sm-2 control-label')); ?>

                <div class="col-sm-10">
                    <?php echo Form::text('name',null, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                </div>
            </div>
            <div class="form-group">
                <?php echo Form::label('type',trans_choice('general.category',1),array('class'=>'col-sm-2 control-label')); ?>

                <div class="col-sm-10">
                    <?php echo Form::select('type',array('current'=>trans_choice('general.current',1).' '.trans_choice('general.asset',1),'fixed'=>trans_choice('general.fixed',1).' '.trans_choice('general.asset',1),'intangible'=>trans_choice('general.intangible',1).' '.trans_choice('general.asset',1),'investment'=>trans_choice('general.investment',1).' '.trans_choice('general.asset',1),'other'=>trans_choice('general.other',1).' '.trans_choice('general.asset',1)),null, array('class' => 'form-control', ''=>"",'required'=>'required')); ?>

                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>