<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.loan',1)); ?>  <?php echo e(trans_choice('general.balance',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                <?php echo e(trans_choice('general.loan',1)); ?>  <?php echo e(trans_choice('general.balance',1)); ?>

                <?php if(!empty($start_date)): ?>
                    for period: <b><?php echo e($start_date); ?> to <?php echo e($end_date); ?></b>
                <?php endif; ?>
            </h3>

            <div class="box-tools pull-right">
                <button class="btn btn-sm btn-info hidden-print" onclick="window.print()">Print</button>
            </div>
        </div>
        <div class="box-body hidden-print">
            <h4 class=""><?php echo e(trans_choice('general.date',1)); ?> <?php echo e(trans_choice('general.range',1)); ?></h4>
            <?php echo Form::open(array('url' => Request::url(), 'method' => 'post','class'=>'form-horizontal', 'name' => 'form')); ?>

            <div class="row">
                <div class="col-xs-4">
                    <?php echo Form::text('start_date',null, array('class' => 'form-control date-picker', 'placeholder'=>"From Date",'required'=>'required')); ?>

                </div>
                <div class="col-xs-4">
                    <?php echo Form::text('end_date',null, array('class' => 'form-control date-picker', 'placeholder'=>"To Date",'required'=>'required')); ?>

                </div>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2">
                        <span class="input-group-btn">
                          <button type="submit" class="btn bg-olive btn-flat"><?php echo e(trans_choice('general.search',1)); ?>!
                          </button>
                        </span>
                        <span class="input-group-btn">
                          <a href="<?php echo e(Request::url()); ?>"
                             class="btn bg-purple  btn-flat pull-right"><?php echo e(trans_choice('general.reset',1)); ?>!</a>
                        </span>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>


        </div>
        <!-- /.box-body -->

    </div>
    <!-- /.box -->
    <div class="box box-info">
        <div class="box-body table-responsive no-padding">
            <table id="data-table" class="table table-bordered table-striped table-condensed table-hover">
                <thead>
                <tr style="background-color: #D1F9FF">
                    <th><?php echo e(trans_choice('general.borrower',1)); ?></th>
                    <th>#</th>
                    <th><?php echo e(trans_choice('general.principal',1)); ?></th>
                    <th><?php echo e(trans_choice('general.released',1)); ?></th>
                    <th><?php echo e(trans_choice('general.interest',1)); ?>%</th>
                    <th><?php echo e(trans_choice('general.due',1)); ?></th>
                    <th><?php echo e(trans_choice('general.paid',1)); ?></th>
                    <th><?php echo e(trans_choice('general.principal',1)); ?> <?php echo e(trans_choice('general.paid',1)); ?></th>
                    <th><?php echo e(trans_choice('general.interest',1)); ?> <?php echo e(trans_choice('general.paid',1)); ?></th>
                    <th><?php echo e(trans_choice('general.fee',2)); ?></th>
                    <th><?php echo e(trans_choice('general.penalty',1)); ?></th>
                    <th><?php echo e(trans_choice('general.balance',1)); ?></th>
                    <th><?php echo e(trans_choice('general.action',1)); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $principal = 0;
                $balance = 0;
                $due = 0;
                $paid = 0;
                $interest_paid = 0;
                $principal_paid = 0;
                $fees = 0;
                $penalty = 0;
                ?>
                <?php foreach($data as $key): ?>
                    <?php
                    $principal = $principal + $key->principal;
                    $balance = $balance + \App\Helpers\GeneralHelper::loan_total_balance($key->id);
                    $paid = $paid + \App\Helpers\GeneralHelper::loan_total_paid($key->id);
                    $interest_paid = $interest_paid + \App\Helpers\GeneralHelper::loan_paid_item($key->id, 'interest');
                    $principal_paid = $principal_paid + \App\Helpers\GeneralHelper::loan_paid_item($key->id,
                                    'principal');
                    $fees = $fees + \App\Helpers\GeneralHelper::loan_total_fees($key->id);
                    $penalty = $penalty + \App\Helpers\GeneralHelper::loan_total_penalty($key->id);
                    ?>
                    <tr>
                        <td>
                            <?php if(!empty($key->borrower)): ?>
                                <a href="<?php echo e(url('borrower/'.$key->borrower_id.'/show')); ?>"><?php echo e($key->borrower->first_name); ?> <?php echo e($key->borrower->last_name); ?></a>
                            <?php else: ?>
                                <span class="label label-danger"><?php echo e(trans_choice('general.broken',1)); ?> <i
                                            class="fa fa-exclamation-triangle"></i> </span>
                            <?php endif; ?>
                            <?php echo e($key->name); ?>

                        </td>
                        <td><?php echo e($key->id); ?></td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($key->principal,2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format($key->principal,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td><?php echo e($key->release_date); ?></td>
                        <td>
                            <?php echo e(number_format($key->interest_rate,2)); ?>%/<?php echo e($key->interest_period); ?>

                        </td>
                        <td>
                            <?php if($key->override==1): ?>
                                <?php   $due = $due + $key->balance; ?>
                                <s><?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_due_amount($key->id),2)); ?></s><br>
                                <?php echo e(number_format($key->balance,2)); ?>

                            <?php else: ?>
                                <?php   $due = $due + \App\Helpers\GeneralHelper::loan_total_due_amount($key->id); ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_due_amount($key->id),2)); ?>

                            <?php endif; ?>

                        </td>
                        <td><?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_paid($key->id),2)); ?></td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_paid_item($key->id,'principal'),2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_paid_item($key->id,'principal'),2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_paid_item($key->id,'interest'),2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_paid_item($key->id,'interest'),2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_fees($key->id),2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_fees($key->id),2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td>
                            <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                                <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_penalty($key->id),2)); ?>

                            <?php else: ?>
                                <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_penalty($key->id),2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?>

                            <?php endif; ?>

                        </td>
                        <td>
                            <?php echo e(number_format(\App\Helpers\GeneralHelper::loan_total_balance($key->id),2)); ?>

                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                        data-toggle="dropdown" aria-expanded="false">
                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <?php if(Sentinel::hasAccess('loans.view')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/show')); ?>"><i
                                                        class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('loans.create')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/edit')); ?>"><i
                                                        class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?> </a></li>
                                    <?php endif; ?>
                                    <?php if(Sentinel::hasAccess('loans.delete')): ?>
                                        <li><a href="<?php echo e(url('loan/'.$key->id.'/delete')); ?>"
                                               class="delete"><i
                                                        class="fa fa-trash"></i> <?php echo e(trans('general.delete')); ?> </a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b><?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($principal,2)); ?></b>
                        <?php else: ?>
                            <b><?php echo e(number_format($principal,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b>  <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($due,2)); ?></b>
                        <?php else: ?>
                            <b><?php echo e(number_format($due,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($paid,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($paid,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($principal_paid,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($principal_paid,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($interest_paid,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($interest_paid,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($fees,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($fees,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($penalty,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($penalty,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if(\App\Models\Setting::where('setting_key', 'currency_position')->first()->setting_value=='left'): ?>
                            <b><?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?> <?php echo e(number_format($balance,2)); ?></b>
                        <?php else: ?>
                            <b> <?php echo e(number_format($balance,2)); ?> <?php echo e(\App\Models\Setting::where('setting_key', 'currency_symbol')->first()->setting_value); ?></b>
                        <?php endif; ?>
                    </td>
                    <td></td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>