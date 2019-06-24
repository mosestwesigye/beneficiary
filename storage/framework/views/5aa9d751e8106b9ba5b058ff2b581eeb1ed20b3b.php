<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.expense',1)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.expense',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('expense/store'), 'method' => 'post','class'=>'', 'name' => 'form',"enctype"=>"multipart/form-data")); ?>

        <div class="box-body">
            <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.required',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

            <div class="form-group">
                <?php echo Form::label('expense_type_id',trans_choice('general.expense',1).' '.trans_choice('general.type',1),array('class'=>' control-label')); ?>


                <?php echo Form::select('expense_type_id',$types,null, array('class' => 'form-control','required'=>'required')); ?>


            </div>
            <div class="form-group">
                <?php echo Form::label('amount',trans_choice('general.expense',1).' '.trans_choice('general.amount',1),array('class'=>'')); ?>

                <?php echo Form::text('amount',null, array('class' => 'form-control touchspin', 'placeholder'=>"",'required'=>'required')); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('date',trans_choice('general.date',1),array('class'=>'')); ?>

                <?php echo Form::text('date',null, array('class' => 'form-control date-picker', 'placeholder'=>"",'required'=>'required')); ?>

            </div>
            <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.optional',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

            <div class="form-group">
                <?php echo Form::label('recurring',trans_choice('general.is_expenses_recurring',1),array('class'=>'active')); ?>

                <?php echo Form::select('recurring', array('1'=>trans_choice('general.yes',1),'0'=>trans_choice('general.no',1)),0, array('class' => 'form-control','id'=>'recurring')); ?>

            </div>
            <div id="recur">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo Form::label('recur_frequency',trans_choice('general.recur_frequency',1),array('class'=>'')); ?>

                                <?php echo Form::number('recur_frequency',1, array('class' => 'form-control','id'=>'recurF')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo Form::label('recur_type',trans_choice('general.recur_type',1),array('class'=>'active')); ?>

                                <?php echo Form::select('recur_type', array('day'=>trans_choice('general.day',1).'(s)','week'=>trans_choice('general.week',1).'(s)','month'=>trans_choice('general.month',1).'(s)','year'=>trans_choice('general.year',1).'(s)'),'month', array('class' => 'form-control','id'=>'recurT')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo Form::label('recur_start_date',trans_choice('general.recur_starts',1),array('class'=>'')); ?>

                                <?php echo Form::text('recur_start_date',date("Y-m-d"), array('class' => 'form-control date-picker','id'=>'recur_start_date')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-line">
                                <?php echo Form::label('recur_end_date',trans_choice('general.recur_ends',1),array('class'=>'')); ?>

                                <?php echo Form::text('recur_end_date',null, array('class' => 'form-control date-picker','id'=>'recur_end_date')); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <?php echo Form::label('notes',trans_choice('general.description',1),array('class'=>'')); ?>

                <?php echo Form::textarea('notes',null, array('class' => 'form-control')); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('files',trans_choice('general.file',2).'('.trans_choice('general.borrower_file_types',1).')',array('class'=>'')); ?>

                <?php echo Form::file('files[]', array('class' => 'form-control', 'multiple'=>"",'rows'=>'3')); ?>

                <div class="col-sm-12"><?php echo e(trans_choice('general.select_thirty_files',1)); ?>

                </div>
            </div>
            <div class="form-group">
                <hr>
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

        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

                <!-- /.box-body -->
    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>

        $(document).ready(function (e) {
            if ($('#recurring').val() == '1') {
                $('#recur').show();
                $('#recurT').attr('required', 'required');
                $('#recur_start_date').attr('required', 'required');
                $('#recurF').attr('required', 'required');
            } else {
                $('#recur').hide();
                $('#recurT').removeAttr('required');
                $('#recur_start_date').removeAttr('required');
                $('#recurF').removeAttr('required');
            }
            $('#recurring').change(function () {
                if ($('#recurring').val() == '1') {
                    $('#recur').show();
                    $('#recurT').attr('required', 'required');
                    $('#recurF').attr('required', 'required');
                    $('#recur_start_date').attr('required', 'required');
                } else {
                    $('#recur').hide();
                    $('#recurT').removeAttr('required');
                    $('#recur_start_date').removeAttr('required');
                    $('#recurF').removeAttr('required');
                }
            })
        })

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>