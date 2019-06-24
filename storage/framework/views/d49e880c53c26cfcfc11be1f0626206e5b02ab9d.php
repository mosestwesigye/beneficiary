<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('beneficiary/store'), 'method' => 'post', 'name' => 'form',"enctype"=>"multipart/form-data")); ?>

        <div class="box-body">
            <div class="col-md-12">
                <p class="bg-navy color-palette"><?php echo e(trans_choice('general.required',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

                <div class="form-group">
                    <?php echo Form::label('title',trans_choice('general.title',1),array('class'=>'')); ?>

                    <?php echo Form::select('title',array('Mr'=>trans_choice('general.Mr',1),'Mrs'=>trans_choice('general.Mrs',1), 'Miss'=>trans_choice('general.Miss',1),'Ms'=>trans_choice('general.Ms',1),'Dr'=>trans_choice('general.Dr',1),'Prof'=>trans_choice('general.Prof',1),'Rev'=>trans_choice('general.Rev',1)),'Mr', array('class' => 'form-control',)); ?>

                </div>
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
                    <?php echo Form::label('dob',trans_choice('general.dob',1),array('class'=>'')); ?>

                    <?php echo Form::text('dob',null, array('class' => 'form-control date-picker', 'placeholder'=>"yyyy-mm-dd")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('marital_status',trans_choice('general.marital_status',1),array('class'=>'')); ?>

                    <?php echo Form::select('marital_status',array('Single'=>trans_choice('general.single',1),'Married'=>trans_choice('general.married',1),'Divorced'=>trans_choice('general.divorced',1)),null, array('class' => 'form-control',)); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('country',trans_choice('general.country',1),array('class'=>'')); ?>

                    <?php echo Form::text('country',\App\Models\Setting::where('setting_key','company_country')->first()->setting_value, array('class' => 'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                  <?php echo Form::label('district',trans_choice('general.district',1),array('class'=>'')); ?>

                  <?php echo Form::select('district',$district,null, array('class' => 'form-control select2','id'=>'user_id','placeholder'=>'Select')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('mobile',trans_choice('general.mobile',1),array('class'=>'')); ?>

                    <?php echo Form::text('mobile',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.numbers_only',1))); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('ratio_id',trans_choice('general.ratio_id',1),array('class'=>'')); ?>

                    <?php echo Form::text('ratio_id',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('national_id',trans_choice('general.national_id',1),array('class'=>'')); ?>

                    <?php echo Form::text('national_id',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.national_id',1))); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('bank',trans_choice('general.bank',1),array('class'=>'')); ?>

                    <?php echo Form::text('bank',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('account_number',trans_choice('general.account_number',1),array('class'=>'')); ?>

                    <?php echo Form::text('account_number',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>

                <p class="bg-red color-palette"><?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.package',2)); ?></p>

                <div class="form-group">
                    <?php echo Form::label('mode_of_payment',trans_choice('general.mode_of_payment',1),array('class'=>'')); ?>

                    <?php echo Form::select('mode_of_payment',array('Cash'=>trans_choice('general.cash',1)),null, array('class' => 'form-control',)); ?>

                </div>

                <div class="form-group">
                    <?php echo Form::label('package_amount',trans_choice('general.package_amount',1),array('class'=>'')); ?>

                    <?php echo Form::text('package_amount',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>

                <p class="bg-green color-palette"><?php echo e(trans_choice('general.optional',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>



                <div class="form-group">
                    <?php echo Form::label('email',trans_choice('general.email',1),array('class'=>'')); ?>

                    <?php echo Form::text('email',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.email',1))); ?>

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
                    <?php echo Form::label('zone',trans_choice('general.zone',1),array('class'=>'')); ?>

                    <?php echo Form::text('zone',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('place_of_residence',trans_choice('general.place_of_residence',1),array('class'=>'')); ?>

                    <?php echo Form::text('place_of_residence',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('arrival_date',trans_choice('general.arrival_date',1),array('class'=>'')); ?>

                    <?php echo Form::text('arrival_date',null, array('class' => 'form-control date-picker', 'placeholder'=>"yyyy-mm-dd")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('village',trans_choice('general.village',1),array('class'=>'')); ?>

                    <?php echo Form::text('village',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('working_status',trans_choice('general.working_status',1),array('class'=>'')); ?>

                    <?php echo Form::select('working_status',array('Employee'=>trans_choice('general.Employee',1),'Owner'=>trans_choice('general.Owner',1),'Student'=>trans_choice('general.Student',1),'Overseas Worker'=>trans_choice('general.Overseas Worker',1),'Pensioner'=>trans_choice('general.Pensioner',1),'Unemployed'=>trans_choice('general.Unemployed',1)),null, array('class' => 'form-control',)); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('special_needs',trans_choice('general.special_needs',1),array('class'=>'')); ?>

                    <?php echo Form::textarea('special_needs',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('spouse_name',trans_choice('general.spouse_name',1),array('class'=>'')); ?>

                    <?php echo Form::text('spouse_name',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('spouse_contact',trans_choice('general.spouse_contact',1),array('class'=>'')); ?>

                    <?php echo Form::text('spouse_contact',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('number_dependants',trans_choice('general.number_dependants',1),array('class'=>'')); ?>

                    <?php echo Form::text('number_dependants',null, array('class' => 'form-control', 'placeholder'=>"")); ?>

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
                    <?php echo Form::label('files',trans_choice('general.file',2). ' '.trans_choice('general.beneficiary',2),array('class'=>'')); ?>

                    <?php echo Form::file('files[]', array('class' => 'form-control', 'multiple'=>"")); ?>

                    <div class="col-sm-12">
                        <?php echo e(trans_choice('general.select_thirty_files',2)); ?>

                    </div>
                </div>
                <div class="form-group">
                    <hr>
                </div>
                <div class="form-group">
                    <?php echo Form::label('Staff_officers',trans_choice('general.staff_officer_access',2),array('class'=>'')); ?>

                    <?php echo Form::select('loan_officers[]',$user,null, array('class' => 'form-control select2','multiple'=>'')); ?>

                    <p>
                        <small>You can assign beneficiaries to the above data officers. </small>
                    </p>
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