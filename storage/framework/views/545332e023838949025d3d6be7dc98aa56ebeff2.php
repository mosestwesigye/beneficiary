<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.custom_field',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.custom_field',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('custom_field/store'), 'method' => 'post', 'name' => 'form')); ?>


        <div class="box-body">
            <div class="col-md-12">
                <div class="form-group">
                    <?php echo Form::label('category',trans_choice('general.category',1),array('class'=>'')); ?>

                    <?php echo Form::select('category',array('beneficiaries'=>trans_choice('general.add',1).' '.trans_choice('general.beneficiary',1),'loans'=>trans_choice('general.add',1).' '.trans_choice('general.loan',1),'expenses'=>trans_choice('general.add',1).' '.trans_choice('general.expense',1),'other_income'=>trans_choice('general.add',1).' '.trans_choice('general.other_income',1),'collateral'=>trans_choice('general.add',1).' '.trans_choice('general.collateral',1),'repayments'=>'Add Repayment'),'beneficiaries', array('class' => 'form-control','required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <?php echo Form::label('name',trans_choice('general.field',1).' '.trans_choice('general.name',1),array('class'=>'')); ?>

                    <?php echo Form::text('name',null, array('class' => 'form-control', 'placeholder'=>trans_choice('general.field',1).' '.trans_choice('general.name',1),'required'=>'required')); ?>

                </div>
                <div class="form-group">
                    <label><?php echo e(trans_choice('general.required_field',1)); ?></label>
                    <label><input type="radio" name="required" required value="0"
                                  checked> <?php echo e(trans_choice('general.no',1)); ?>

                    </label>
                    <label><input type="radio" name="required" required value="1"> <?php echo e(trans_choice('general.yes',1)); ?>

                    </label>
                </div>
                <div class="form-group">
                    <label><?php echo e(trans_choice('general.field',1)); ?> <?php echo e(trans_choice('general.type',1)); ?> </label>
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th width="150">&nbsp;</th>
                            <th><?php echo e(trans_choice('general.description',1)); ?></th>
                            <th><?php echo e(trans_choice('general.allowed_value',2)); ?></th>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="field_type" id="inputType" value="textfield"
                                               required="">
                                        <b><?php echo e(trans_choice('general.text_field',1)); ?></b>

                                    </label>
                                </div>
                            </td>
                            <td><?php echo e(trans_choice('general.text_field_description',1)); ?></td>
                            <td><?php echo e(trans_choice('general.any_value',1)); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="field_type" id="inputType" value="date" required="">
                                        <b><?php echo e(trans_choice('general.date_field',1)); ?></b>

                                    </label>
                                </div>
                            </td>
                            <td><?php echo e(trans_choice('general.date_field_description',1)); ?></td>
                            <td><?php echo e(trans_choice('general.only_date',1)); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="field_type" id="inputType" value="number" required="">
                                        <b><?php echo e(trans_choice('general.number_field',1)); ?></b>

                                    </label>
                                </div>
                            </td>
                            <td><?php echo e(trans_choice('general.number_field_description',1)); ?></td>
                            <td><?php echo e(trans_choice('general.only_number',1)); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="field_type" id="inputType" value="decimal"
                                               required="">
                                        <b><?php echo e(trans_choice('general.decimal_field',1)); ?></b>

                                    </label>
                                </div>
                            </td>
                            <td><?php echo e(trans_choice('general.decimal_field_description',1)); ?></td>
                            <td><?php echo e(trans_choice('general.only_decimal',1)); ?></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="field_type" id="inputType" value="textarea"
                                               required="">
                                        <b><?php echo e(trans_choice('general.textarea',1)); ?></b>

                                    </label>
                                </div>
                            </td>
                            <td><?php echo e(trans_choice('general.textarea_description',1)); ?></td>
                            <td><?php echo e(trans_choice('general.any_value',1)); ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-right"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

        <!-- /.box-body -->
    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>