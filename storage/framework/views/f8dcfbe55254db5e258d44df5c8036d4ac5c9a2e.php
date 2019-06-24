<?php $__env->startSection('title'); ?>
    <?php echo e(trans('login.login')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b><?php echo e(\App\Models\Setting::where('setting_key','company_name')->first()->setting_value); ?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <?php if(Session::has('flash_notification.message')): ?>
                <script>toastr.<?php echo e(Session::get('flash_notification.level')); ?>('<?php echo e(Session::get("flash_notification.message")); ?>', 'Response Status')</script>
            <?php endif; ?>
            <?php if(isset($msg)): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e($msg); ?>

                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e($error); ?>

                </div>
            <?php endif; ?>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors->all() as $error): ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php echo Form::open(array('url' => url('login'), 'method' => 'post', 'name' => 'form','class'=>'login-form')); ?>

            <p class="login-box-msg"><?php echo e(trans('login.sign_in')); ?></p>

            <div class="form-group has-feedback">
                <?php echo Form::email('email', null, array('class' => 'form-control', 'placeholder'=>trans('login.email'),'required'=>'required')); ?>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <?php echo Form::password('password', array('class' => 'form-control', 'placeholder'=>trans('login.password'),'required'=>'required')); ?>

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox" name="remember" value="1"> <?php echo e(trans('login.remember')); ?>

                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"><?php echo e(trans('login.login')); ?></button>
                </div>
                <!-- /.col -->
            </div>
            <a href="javascript:;" id="forget-password"><?php echo e(trans('login.reset')); ?></a><br>
            <?php echo Form::close(); ?>

            <?php echo Form::open(array('url' => url('reset'), 'method' => 'post', 'name' => 'form','class'=>'forget-form ')); ?>

            <p class="login-box-msg"><?php echo e(trans('login.reset_msg')); ?></p>

            <div class="form-group has-feedback">
                <?php echo Form::email('email', null, array('class' => 'form-control', 'placeholder'=>trans('login.email'),'required'=>'required')); ?>

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="">
                        <a href="javascript:;" class="btn btn-primary  btn-flat" id="back-btn"><i
                                    class="fa fa-backward"></i> <?php echo e(trans('login.back')); ?></a>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit"
                            class="btn btn-primary btn-block btn-flat"><?php echo e(trans('login.reset_btn')); ?></button>
                </div>
                <!-- /.col -->
            </div>
            <?php echo Form::close(); ?>

        </div>

    </div>

    <script>
        $(document).ready(function () {
            jQuery('#forget-password').click(function () {
                jQuery('.login-form').hide();
                jQuery('.forget-form').show();
            });
            jQuery('#register-btn').click(function () {
                jQuery('.login-form').hide();
                jQuery('.register-form').show();
            });

            jQuery('#back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.forget-form').hide();
            });
            jQuery('#register-back-btn').click(function () {
                jQuery('.login-form').show();
                jQuery('.register-form').hide();
            });
            $('#check_btn').click(function (e) {
                e.preventDefault();
                var repair = $('#repair_number').val();
                if (repair == '') {
                    toastr.warning('Repair Number can not be empty', 'Response Status')
                } else {
                    $.ajax( {
                        url:'<?php echo url('check'); ?>/'+repair,
                        success: function(data) {
                            toastr.success('Loading information', 'Response Status')
                            $('#status').find('.modal-body').html($(data));
                            $('#status').modal();
                        },
                        error: function() {
                            toastr.warning('There was an error processing the request', 'Response Status')
                        },
                        type:'GET'
                    });
                }
            })
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>