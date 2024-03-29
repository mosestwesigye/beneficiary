<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.borrower',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.borrower',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('borrower/store'), 'method' => 'post', 'name' => 'form',"enctype"=>"multipart/form-data")); ?>

        <div class="box-body">
            <div class="col-md-12">
                <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.required',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

                <div class="form-group">
                    <?php echo Form::label('first_name',trans_choice('general.first_name',1),array('class'=>'')); ?>

                    <?php echo Form::text('first_name',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.first_name',1),'required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('last_name',trans_choice('general.last_name',1),array('class'=>'')); ?>

                    <?php echo Form::text('last_name',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.last_name',1),'required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('gender',trans_choice('general.gender',1),array('class'=>'')); ?>

                    <?php echo Form::select('gender',array('Male'=>trans_choice('general.Male',1),'Female'=>trans_choice('general.Female',1)),'Male', array('class' => 'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('country',trans_choice('general.country',1),array('class'=>'')); ?>

                    <?php echo Form::text('country',\App\Models\Setting::where('setting_key','company_country')->first()->setting_value, array('class' => 'form-control','required'=>'required')); ?>

                </div>
                <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.optional',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

                <div class="form-group">
                    <?php echo Form::label('title',trans_choice('general.title',1),array('class'=>'')); ?>

                    <?php echo Form::select('title',array('Mr'=>trans_choice('general.Mr',1),'Mrs'=>trans_choice('general.Mrs',1), 'Miss'=>trans_choice('general.Miss',1),'Ms'=>trans_choice('general.Ms',1),'Dr'=>trans_choice('general.Dr',1),'Prof'=>trans_choice('general.Prof',1),'Rev'=>trans_choice('general.Rev',1)),'Mr', array('class' => 'form-control',)); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('mobile',trans_choice('general.mobile',1),array('class'=>'')); ?>

                    <?php echo Form::text('mobile',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.numbers_only',1))); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('email',trans_choice('general.email',1),array('class'=>'')); ?>

                    <?php echo Form::text('email',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.email',1))); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('unique_number',trans_choice('general.unique_number',1),array('class'=>'')); ?>

                    <?php echo Form::text('unique_number',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.unique_number',1))); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('dob',trans_choice('general.dob',1),array('class'=>'')); ?>

                    <?php echo Form::text('dob',null, array('class' => 'form-control date-picker', 'placeholder'=>"yyyy-mm-dd")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('address',trans_choice('general.address',1),array('class'=>'')); ?>

                    <?php echo Form::text('address',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('city',trans_choice('general.city',1),array('class'=>'')); ?>

                    <?php echo Form::text('city',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('state',trans_choice('general.state',1),array('class'=>'')); ?>

                    <?php echo Form::text('state',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('zip',trans_choice('general.zip',1),array('class'=>'')); ?>

                    <?php echo Form::text('zip',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('phone',trans_choice('general.phone',1),array('class'=>'')); ?>

                    <?php echo Form::text('phone',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('business_name',trans_choice('general.business',1),array('class'=>'')); ?>

                    <?php echo Form::text('business_name',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('working_status',trans_choice('general.working_status',1),array('class'=>'')); ?>

                    <?php echo Form::select('working_status',array('Employee'=>trans_choice('general.Employee',1),'Owner'=>trans_choice('general.Owner',1),'Student'=>trans_choice('general.Student',1),'Overseas Worker'=>trans_choice('general.Overseas Worker',1),'Pensioner'=>trans_choice('general.Pensioner',1),'Unemployed'=>trans_choice('general.Unemployed',1)),null, array('class' => 'form-control',)); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('photo',trans_choice('general.photo',1),array('class'=>'')); ?>

                    <?php echo Form::file('photo', array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('notes',trans_choice('general.description',1),array('class'=>'')); ?>

                    <?php echo Form::textarea('notes',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('files',trans_choice('general.file',2). ' '.trans_choice('general.borrower_file_types',2),array('class'=>'')); ?>

                    <?php echo Form::file('files[]', array('class' => 'form-control', 'multiple'=>"")); ?>

                    <div class="col-sm-12">
                        <?php echo e(trans_choice('general.select_thirty_files',2)); ?>

                    </div>
                </div>
                <div class="form-group">
                    <hr>
                </div>
                <div class="form-group">
                    <?php echo Form::label('loan_officers',trans_choice('general.loan_officer_access',2),array('class'=>'')); ?>

                    <?php echo Form::select('loan_officers[]',$user,null, array('class' => 'form-control select2','multiple'=>'')); ?>

                    <p>
                        <small>You can assign borrower to the above loan officers. This borrower will appear in the
                            <b><a
                                        href=""
                                        target="_blank">Daily Collection Sheet</a></b> and the <b><a
                                        href=""
                                        target="_blank">Past Maturity Date Loans Sheet</a></b> of the staff. This will
                            allow
                            you to download the daily collection sheet for each staff and the staff will know which
                            borrower
                            to chase for payment.
                        </small>
                    </p>
                </div>
                <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.login',1)); ?> <?php echo e(trans_choice('general.detail',2)); ?></p>

                <div class="form-group">
                    <?php echo Form::label('username',trans_choice('general.username',1),array('class'=>'')); ?>

                    <?php echo Form::text('username',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('password',trans_choice('general.password',1),array('class'=>'')); ?>

                    <?php echo Form::password('password', array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('repeatpassword',trans_choice('general.repeat_password',1),array('class'=>'')); ?>

                    <?php echo Form::password('repeatpassword', array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.custom_field',2)); ?></p>
                <?php foreach($custom_fields as $key): ?>

                    <div class="form-group">
                        <?php echo Form::label($key->id,$key->name,array('class'=>'')); ?>

                        <?php if($key->field_type=="number"): ?>
                            <input type="number" class="form-control" name="<?php echo e($key->id); ?>"
                                   <?php if($key->required==1): ?> required <?php endif; ?>>
                        <?php endif; ?>
                        <?php if($key->field_type=="textfield"): ?>
                            <input type="text" class="form-control" name="<?php echo e($key->id); ?>"
                                   <?php if($key->required==1): ?> required <?php endif; ?>>
                        <?php endif; ?>
                        <?php if($key->field_type=="date"): ?>
                            <input type="text" class="form-control date-picker" name="<?php echo e($key->id); ?>"
                                   <?php if($key->required==1): ?> required <?php endif; ?>>
                        <?php endif; ?>
                        <?php if($key->field_type=="textarea"): ?>
                            <textarea class="form-control" name="<?php echo e($key->id); ?>"
                                      <?php if($key->required==1): ?> required <?php endif; ?>></textarea>
                        <?php endif; ?>
                        <?php if($key->field_type=="decimal"): ?>
                            <input type="text" class="form-control touchspin" name="<?php echo e($key->id); ?>"
                                   <?php if($key->required==1): ?> required <?php endif; ?>>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
                <p style="text-align:center; font-weight:bold;">
                    <small><a href="<?php echo e(url('custom_field/create')); ?>" target="_blank">Click here to add custom fields on
                            this page</a></small>
                </p>


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