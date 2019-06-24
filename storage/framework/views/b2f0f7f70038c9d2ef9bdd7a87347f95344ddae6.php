<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.setting',2)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <?php echo Form::open(array('url' => url('setting/update'), 'method' => 'post', 'name' => 'form','class'=>"form-horizontal","enctype"=>"multipart/form-data")); ?>

        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.setting',2)); ?></h3>

            <div class="box-tools pull-right">
                <button type="submit" class="btn btn-info"><?php echo e(trans('general.save')); ?></button>
            </div>
        </div>
        <div class="box-body">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li><a href="#general" data-toggle="tab"><?php echo e(trans('general.general')); ?></a></li>
                    <!--   <li><a href="#sms" data-toggle="tab"><?php echo e(trans('general.sms')); ?></a></li>
                 <li><a href="#email_templates"
                           data-toggle="tab"><?php echo e(trans_choice('general.email',1)); ?> <?php echo e(trans_choice('general.template',2)); ?></a>
                    </li>
                    <li><a href="#sms_templates"
                           data-toggle="tab"><?php echo e(trans_choice('general.sms',1)); ?> <?php echo e(trans_choice('general.template',2)); ?></a>
                    </li>
                  -->
                    <li class="active"><a href="#system" data-toggle="tab"><?php echo e(trans_choice('general.system',1)); ?></a>
                    </li>
                    <li><a href="#payments" data-toggle="tab"><?php echo e(trans_choice('general.payment',2)); ?></a></li>
                    <li><a href="#update" data-toggle="tab"><?php echo e(trans_choice('general.update',2)); ?></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="general">
                        <div class="form-group">
                            <?php echo Form::label('company_name',trans('general.company_name'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('company_name',\App\Models\Setting::where('setting_key','company_name')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_email',trans('general.company_email'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::email('company_email',\App\Models\Setting::where('setting_key','company_email')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_website',trans('general.company_website'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('company_website',\App\Models\Setting::where('setting_key','company_website')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_address',trans('general.company_address'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::textarea('company_address',\App\Models\Setting::where('setting_key','company_address')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_country',trans('general.country'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('company_country',\App\Models\Setting::where('setting_key','company_country')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('portal_address',trans('general.portal_address'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('portal_address',\App\Models\Setting::where('setting_key','portal_address')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_currency',trans('general.currency'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('company_currency',\App\Models\Setting::where('setting_key','company_currency')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('currency_symbol',trans('general.currency_symbol'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::text('currency_symbol',\App\Models\Setting::where('setting_key','currency_symbol')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('currency_position',trans('general.currency_position'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php echo Form::select('currency_position',array('left'=>trans('general.left'),'right'=>trans('general.right')),\App\Models\Setting::where('setting_key','currency_position')->first()->setting_value,array('class'=>'form-control','required'=>'required')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('company_logo',trans('general.company_logo'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php if(!empty(\App\Models\Setting::where('setting_key','company_logo')->first()->setting_value)): ?>
                                    <img src="<?php echo e(url(asset('uploads/'.\App\Models\Setting::where('setting_key','company_logo')->first()->setting_value))); ?>"
                                         class="img-responsive"/>

                                <?php endif; ?>
                                <?php echo Form::file('company_logo','',array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('client_login_background',trans('general.client_login_background'),array('class'=>'col-sm-2 control-label')); ?>

                            <div class="col-sm-10">
                                <?php if(!empty(\App\Models\Setting::where('setting_key','client_login_background')->first()->setting_value)): ?>
                                    <img src="<?php echo e(url(asset('uploads/'.\App\Models\Setting::where('setting_key','client_login_background')->first()->setting_value))); ?>"
                                         class="img-responsive"/>

                                <?php endif; ?>
                                <?php echo Form::file('client_login_background','',array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-info"><?php echo e(trans('general.save')); ?></button>
                            </div>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                  
                    <div class="tab-pane active" id="system">
                        <div class="form-group">
                            <?php echo Form::label('enable_cron',trans('general.cron_enabled'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('enable_cron',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','enable_cron')->first()->setting_value,array('class'=>'form-control')); ?>

                                <small>Last
                                    Run:<?php if(!empty(\App\Models\Setting::where('setting_key','cron_last_run')->first()->setting_value)): ?> <?php echo e(\App\Models\Setting::where('setting_key','cron_last_run')->first()->setting_value); ?> <?php else: ?>
                                        Never <?php endif; ?></small>
                                <br>
                                <small>Cron Url: <?php echo e(url('cron')); ?></small>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_apply_penalty',trans('general.auto_apply_penalty'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_apply_penalty',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_apply_penalty')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_payment_receipt_email',trans('general.auto_payment_receipt_email'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_payment_receipt_email',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_payment_receipt_email')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_payment_receipt_sms',trans('general.auto_payment_receipt_sms'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_payment_receipt_sms',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_payment_receipt_sms')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_repayment_sms_reminder',trans('general.auto_repayment_sms_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_repayment_sms_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_repayment_sms_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_repayment_email_reminder',trans('general.auto_repayment_email_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_repayment_email_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_repayment_email_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_repayment_days',trans('general.auto_repayment_days'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::number('auto_repayment_days',\App\Models\Setting::where('setting_key','auto_repayment_days')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_repayment_sms_reminder',trans('general.auto_overdue_repayment_sms_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_overdue_repayment_sms_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_overdue_repayment_sms_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_repayment_email_reminder',trans('general.auto_overdue_repayment_email_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_overdue_repayment_email_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_overdue_repayment_email_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_repayment_days',trans('general.auto_overdue_repayment_days'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::number('auto_overdue_repayment_days',\App\Models\Setting::where('setting_key','auto_overdue_repayment_days')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_loan_sms_reminder',trans('general.auto_overdue_loan_sms_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_overdue_loan_sms_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_overdue_loan_sms_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_loan_email_reminder',trans('general.auto_overdue_loan_email_reminder'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_overdue_loan_email_reminder',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_overdue_loan_email_reminder')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_overdue_loan_days',trans('general.auto_overdue_loan_days'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::number('auto_overdue_loan_days',\App\Models\Setting::where('setting_key','auto_overdue_loan_days')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('allow_self_registration',trans('general.allow_self_registration'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('allow_self_registration',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','allow_self_registration')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('client_auto_activate_account',trans('general.client_auto_activate_account'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('client_auto_activate_account',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','client_auto_activate_account')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('allow_client_login',trans('general.allow_client_login'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('allow_client_login',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','allow_client_login')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('client_request_guarantor',trans('general.client_request_guarantor'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('client_request_guarantor',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','client_request_guarantor')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('allow_client_apply',trans('general.allow_client_apply'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('allow_client_apply',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','allow_client_apply')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('auto_post_savings_interest',trans('general.auto_post_savings_interest'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('auto_post_savings_interest',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','auto_post_savings_interest')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('welcome_note',trans('general.welcome_note'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::textarea('welcome_note',\App\Models\Setting::where('setting_key','welcome_note')->first()->setting_value,array('class'=>'form-control','rows'=>'3')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane " id="payments">

                        <div class="form-group">
                            <?php echo Form::label('enable_online_payment',trans('general.enable_online_payment'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('enable_online_payment',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','enable_online_payment')->first()->setting_value,array('class'=>'form-control')); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('paypal_enabled',trans('general.paypal_enabled'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('paypal_enabled',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','paypal_enabled')->first()->setting_value,array('class'=>'form-control','id'=>'paypal_enabled')); ?>

                            </div>
                        </div>
                        <div class="form-group" id="paypalDiv">
                            <?php echo Form::label('paypal_email',trans('general.paypal_email'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::text('paypal_email',\App\Models\Setting::where('setting_key','paypal_email')->first()->setting_value,array('class'=>'form-control','id'=>'paypal_email')); ?>

                                <p>Paypal Loan IPN URL:<?php echo e(url('client/loan/pay/paypal/ipn')); ?></p>

                                <p>Paypal Savings IPN URL:<?php echo e(url('client/saving/pay/paypal/ipn')); ?></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo Form::label('paynow_enabled',trans('general.paynow_enabled'),array('class'=>'col-sm-3 control-label')); ?>

                            <div class="col-sm-9">
                                <?php echo Form::select('paynow_enabled',array('1'=>trans('general.yes'),'0'=>trans('general.no')),\App\Models\Setting::where('setting_key','paynow_enabled')->first()->setting_value,array('class'=>'form-control','id'=>'paynow_enabled')); ?>

                            </div>
                        </div>
                        <div id="paynowDiv">
                            <div class="form-group">
                                <?php echo Form::label('paynow_id',trans('general.paynow_id'),array('class'=>'col-sm-3 control-label')); ?>

                                <div class="col-sm-9">
                                    <?php echo Form::text('paynow_id',\App\Models\Setting::where('setting_key','paynow_id')->first()->setting_value,array('class'=>'form-control','id'=>'paynow_id')); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <?php echo Form::label('paynow_key',trans('general.paynow_key'),array('class'=>'col-sm-3 control-label')); ?>

                                <div class="col-sm-9">
                                    <?php echo Form::text('paynow_key',\App\Models\Setting::where('setting_key','paynow_key')->first()->setting_value,array('class'=>'form-control','id'=>'paynow_key')); ?>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane" id="update">
                        <div class="form-group">
                            <div class="col-sm-4 text-right">Local Version:</div>

                            <div class="col-sm-4">
                                <span class="label label-primary"><?php echo e(\App\Models\Setting::where('setting_key','system_version')->first()->setting_value); ?></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 text-right">Server Version:</div>

                            <div class="col-sm-4">
                                <button class="btn btn-info btn-sm" type="button" id="checkUpdate">Check Version
                                </button>
                                <br>
                                <span class="label label-primary" id="serverVersion"></span>
                            </div>
                        </div>
                        <div id="updateMessage"></div>
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right"><?php echo e(trans('general.save')); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>
        $('#checkUpdate').click(function (e) {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(\App\Models\Setting::where('setting_key','update_url')->first()->setting_value); ?>',
                dataType: 'json',
                success: function (data) {
                    if ("<?php echo \App\Models\Setting::where('setting_key','system_version')->first()->setting_value; ?>}" < data.version) {
                        swal({
                            title: '<?php echo e(trans_choice('general.update_available',1)); ?><br>v' + data.version,
                            html: data.notes,
                            type: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?php echo e(trans_choice('general.download',1)); ?>',
                            cancelButtonText: '<?php echo e(trans_choice('general.cancel',1)); ?>'
                        }).then(function () {
                            //curl function to download update
                            //notify user that update is in progress, do not navigate from page
                            $('#updateMessage').html("<div class='alert alert-warning'><?php echo e(trans_choice('general.do_not_navigate_from_page',1)); ?></div>");
                            window.location = "<?php echo e(url('update/download?url=')); ?>" + data.url;
                        });
                        $('#serverVersion').html(data.version);
                    } else {
                        swal({
                            title: '<?php echo e(trans_choice('general.no_update_available',1)); ?>',
                            text: '<?php echo e(trans_choice('general.system_is_up_to_date',1)); ?>',
                            type: 'warning',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?php echo e(trans_choice('general.ok',1)); ?>',
                            cancelButtonText: '<?php echo e(trans_choice('general.cancel',1)); ?>'
                        })
                    }
                }
                ,
                error: function (e) {
                    alert("There was an error connecting to the server")
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>