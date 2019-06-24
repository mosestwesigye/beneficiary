<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.edit',1)); ?> <?php echo e(trans_choice('general.user',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.edit',1)); ?> <?php echo e(trans_choice('general.user',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => 'user/'.$user->id.'/update','class'=>'form-horizontal',"enctype" => "multipart/form-data")); ?>

        <div class="box-body">
            <div class="col-md-12">
                <?php echo Form::hidden('previous_role',$selected,array('class'=>'form-control','required'=>'required')); ?>

                <div class="form-group">
                    <?php echo Form::label(trans('general.first_name'),null,array('class'=>'control-label')); ?>


                    <?php echo Form::text('first_name',$user->first_name,array('class'=>'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.last_name'),null,array('class'=>'control-label')); ?>

                    <?php echo Form::text('last_name',$user->last_name,array('class'=>'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.gender'),null,array('class'=>' control-label')); ?>

                    <?php echo Form::select('gender', array('Male' =>trans('general.Male'), 'Female' => trans('general.Female')),$user->gender,array('class'=>'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.phone'),null,array('class'=>'control-label')); ?>

                    <?php echo Form::text('phone',$user->phone,array('class'=>'form-control')); ?>

                </div>
                <div class="form-group ">
                    <?php echo Form::label(trans_choice('general.email',1),null,array('class'=>'control-label')); ?>

                    <?php echo Form::email('email',$user->email,array('class'=>'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.password'),null,array('class'=>'control-label')); ?>

                    <?php echo Form::password('password',array('class'=>'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.repeat_password'),null,array('class'=>'control-label')); ?>

                    <?php echo Form::password('rpassword',array('class'=>'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans_choice('general.role',1),null,array('class'=>' control-label')); ?>

                    <?php echo Form::select('role',$role,$selected,array('class'=>'form-control')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans('general.address'),null,array('class'=>'control-label')); ?>

                    <?php echo Form::textarea('address',$user->address,array('class'=>'form-control wysihtml5')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label(trans_choice('general.note',2),null,array('class'=>'control-label')); ?>


                    <?php echo Form::textarea('notes',$user->notes,array('class'=>'form-control wysihtml5')); ?>

                </div>

            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>