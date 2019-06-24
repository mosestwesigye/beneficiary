<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.account',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.account',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('saving/store'), 'method' => 'post', 'name' => 'form',"enctype"=>"multipart/form-data")); ?>

        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo Form::label('borrower_id',trans_choice('general.borrower',1),array('class'=>'')); ?>

                    <?php echo Form::select('borrower_id',$borrowers,$borrower_id, array('class' => 'form-control select2','required'=>'required','placeholder'=>'')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('savings_product_id',trans_choice('general.product',1),array('class'=>'')); ?>

                    <?php echo Form::select('savings_product_id',$savings_products,null, array('class' => 'form-control','required'=>'')); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('notes',trans_choice('general.note',2),array('class'=>'')); ?>

                    <?php echo Form::textarea('notes',null, array('class' => 'form-control', 'placeholder'=>'',)); ?>

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