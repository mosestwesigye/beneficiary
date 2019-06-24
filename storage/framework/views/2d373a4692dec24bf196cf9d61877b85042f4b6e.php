<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.bank',1)); ?> <?php echo e(trans_choice('general.account',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.bank',1)); ?> <?php echo e(trans_choice('general.account',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('capital/bank/store'), 'method' => 'post', 'class' => 'form-horizontal')); ?>

        <div class="box-body">
            <div class="form-group">
                <?php echo Form::label('name',trans_choice('general.name',1),array('class'=>'col-sm-3 control-label')); ?>

                <div class="col-sm-5">
                    <?php echo Form::text('name',null, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                </div>
            </div>

            <div class="form-group">
                <?php echo Form::label('notes',trans_choice('general.note',2),array('class'=>'col-sm-3 control-label')); ?>

                <div class="col-sm-9">
                    <?php echo Form::textarea('notes',null, array('class' => 'form-control', 'rows'=>"4")); ?>

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