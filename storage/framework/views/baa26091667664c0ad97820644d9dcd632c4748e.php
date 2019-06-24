<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?> <?php echo e(trans_choice('general.product',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?> <?php echo e(trans_choice('general.product',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('package/package_product/store'), 'method' => 'post', 'class' => 'form-horizontal')); ?>

        <div class="box-body">
            <div class="form-group">
                <?php echo Form::label('name',trans_choice('general.name',1),array('class'=>'col-sm-3 control-label')); ?>

                <div class="col-sm-5">
                    <?php echo Form::text('name',null, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                </div>
            </div>

            <div class="slidingDiv">
                <hr>
                <p class="text-red"><b><?php echo e(trans_choice('general.principal',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>:</b>
                </p>

                <div class="form-group">
                    <label for="inputDisbursedById"
                           class="col-sm-3 control-label"><?php echo e(trans_choice('general.disbursed_by',1)); ?></label>

                    <div class="col-sm-3">
                        <?php foreach($package_disbursed_by as $key): ?>
                            <label> <input class="inputDisbursedById" type="checkbox" name="package_disbursed_by_id[]"
                                           value="<?php echo e($key->id); ?>"><?php echo e($key->name); ?></label>
                            <br>
                        <?php endforeach; ?>
                    </div>
                </div>






            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary pull-left"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <!-- /.box -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>
        $(document).ready(function () {
            if ($('#override_interest').val() == 0) {
                $('#overrideDiv').hide();
                $('#override_interest_amount').removeAttr('required');
            }
            if ($('#override_interest').val() == 1) {
                $('#overrideDiv').show();
                $('#override_interest_amount').attr('required', 'required');
            }
            $('#override_interest').change(function (e) {
                if ($('#override_interest').val() == 0) {
                    $('#overrideDiv').hide();
                    $('#override_interest_amount').removeAttr('required');
                }
                if ($('#override_interest').val() == 1) {
                    $('#overrideDiv').show();
                    $('#override_interest_amount').attr('required', 'required');
                }
            })
            if ($("#enable_late_repayment_penalty").iCheck('update')[0].checked == false) {
                $('#enable_late_repayment_penalty').val('0');
                $('#late_repayment_penalty_type_percentage').attr('disabled', 'disabled');
                $('#late_repayment_penalty_type_fixed').attr('disabled', 'disabled');
                $('#late_repayment_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                $('#late_repayment_penalty_amount').attr('disabled', 'disabled');
                $('#late_repayment_penalty_grace_period').attr('disabled', 'disabled');
                $('#late_repayment_penalty_recurring').attr('disabled', 'disabled');
            } else {
                if ($("#late_repayment_penalty_type_percentage").iCheck('update')[0].checked) {
                    $('#late_repayment_penalty_calculate').removeAttr('disabled');
                    $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
                    $('#late_repayment_penalty_calculate').attr('required', 'required');
                }
                if ($("#late_repayment_penalty_type_fixed").iCheck('update')[0].checked) {
                    $('#late_repayment_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                    $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
                }
            }
            $("#enable_late_repayment_penalty").on('ifUnchecked', function (e) {
                $('#enable_late_repayment_penalty').val('0');
                $('#late_repayment_penalty_type_percentage').attr('disabled', 'disabled');
                $('#late_repayment_penalty_type_fixed').attr('disabled', 'disabled');
                $('#late_repayment_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                ;
                $('#late_repayment_penalty_amount').attr('disabled', 'disabled');
                $('#late_repayment_penalty_grace_period').attr('disabled', 'disabled');
                $('#late_repayment_penalty_recurring').attr('disabled', 'disabled');
            });
            $("#enable_late_repayment_penalty").on('ifChecked', function (e) {
                $('#enable_late_repayment_penalty').val('1');
                $('#late_repayment_penalty_type_percentage').removeAttr('disabled');
                $('#late_repayment_penalty_type_fixed').removeAttr('disabled');
                $('#late_repayment_penalty_calculate').removeAttr('disabled');
                $('#late_repayment_penalty_amount').removeAttr('disabled');
                $('#late_repayment_penalty_grace_period').removeAttr('disabled');
                $('#late_repayment_penalty_recurring').removeAttr('disabled');
                $('#late_repayment_penalty_amount').attr('required', 'required');
                if ($("#late_repayment_penalty_type_percentage").iCheck('update')[0].checked) {
                    $('#late_repayment_penalty_calculate').removeAttr('disabled');
                    $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
                    $('#late_repayment_penalty_calculate').attr('required', 'required');
                }
                if ($("#late_repayment_penalty_type_fixed").iCheck('update')[0].checked) {
                    $('#late_repayment_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                    $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
                }

            });
            $("#late_repayment_penalty_type_percentage").on('ifUnchecked', function (e) {
                $('#late_repayment_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
            });
            $("#late_repayment_penalty_type_fixed").on('ifUnchecked', function (e) {
                $('#late_repayment_penalty_calculate').removeAttr('disabled', 'disabled').attr('required', 'required');
                $('#late_repayment_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
            });


            if ($("#enable_after_maturity_date_penalty").iCheck('update')[0].checked == false) {
                $('#enable_after_maturity_date_penalty').val('0');
                $('#after_maturity_date_penalty_type_percentage').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_type_fixed').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                $('#after_maturity_date_penalty_amount').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_grace_period').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_recurring').attr('disabled', 'disabled');
            } else {
                if ($("#after_maturity_date_penalty_type_percentage").iCheck('update')[0].checked) {
                    $('#after_maturity_date_penalty_calculate').removeAttr('disabled');
                    $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
                    $('#after_maturity_date_penalty_calculate').attr('required', 'required');
                }
                if ($("#after_maturity_date_penalty_type_fixed").iCheck('update')[0].checked) {
                    $('#after_maturity_date_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                    $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
                }
            }
            $("#enable_after_maturity_date_penalty").on('ifUnchecked', function (e) {
                $('#enable_after_maturity_date_penalty').val('0');
                $('#after_maturity_date_penalty_type_percentage').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_type_fixed').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                $('#after_maturity_date_penalty_amount').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_grace_period').attr('disabled', 'disabled');
                $('#after_maturity_date_penalty_recurring').attr('disabled', 'disabled');
            });
            $("#enable_after_maturity_date_penalty").on('ifChecked', function (e) {
                $('#enable_after_maturity_date_penalty').val('1');
                $('#after_maturity_date_penalty_type_percentage').removeAttr('disabled');
                $('#after_maturity_date_penalty_type_fixed').removeAttr('disabled');
                $('#after_maturity_date_penalty_calculate').removeAttr('disabled');
                $('#after_maturity_date_penalty_amount').removeAttr('disabled');
                $('#after_maturity_date_penalty_grace_period').removeAttr('disabled');
                $('#after_maturity_date_penalty_recurring').removeAttr('disabled');
                $('#after_maturity_date_penalty_amount').attr('required', 'required');
                if ($("#after_maturity_date_penalty_type_percentage").iCheck('update')[0].checked) {
                    $('#after_maturity_date_penalty_calculate').removeAttr('disabled');
                    $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
                    $('#after_maturity_date_penalty_calculate').attr('required', 'required');
                }
                if ($("#after_maturity_date_penalty_type_fixed").iCheck('update')[0].checked) {
                    $('#after_maturity_date_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                    $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
                }

            });
            $("#after_maturity_date_penalty_type_percentage").on('ifUnchecked', function (e) {
                $('#after_maturity_date_penalty_calculate').attr('disabled', 'disabled').removeAttr('required');
                $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?>');
            });
            $("#after_maturity_date_penalty_type_fixed").on('ifUnchecked', function (e) {
                $('#after_maturity_date_penalty_calculate').removeAttr('disabled', 'disabled').attr('required', 'required');
                $('#after_maturity_date_penalty_amount_label').html('<?php echo e(trans_choice('general.penalty',1)); ?> <?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.rate',1)); ?> %');
            });

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>