<?php $__env->startSection('title'); ?>
    <?php echo e($beneficiary_group->name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e($beneficiary_group->name); ?></h3>

                    <div class="box-tools pull-right">

                    </div>
                </div>
                <div class="box-body">
                    <?php echo $beneficiary_group->notes; ?>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo e(trans_choice('general.created_at',1)); ?>: <?php echo e($beneficiary_group->created_at); ?>

                </div>
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo e(trans_choice('general.beneficiary',2)); ?></h3>

                    <div class="box-tools pull-right">
                        <?php if(Sentinel::hasAccess('beneficiaries.groups')): ?>
                            <a href="#" data-toggle="modal" data-target="#addbeneficiary"
                               class="btn btn-info btn-sm"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="data-table" class="table table-bordered table-condensed table-hover">
                            <thead>
                            <tr style="background-color: #D1F9FF">
                                <th><?php echo e(trans_choice('general.full_name',1)); ?></th>
                                <th><?php echo e(trans_choice('general.unique',1)); ?>#</th>
                                <th><?php echo e(trans_choice('general.mobile',1)); ?></th>

                                <th><?php echo e(trans_choice('general.action',1)); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($beneficiary_group->members as $key): ?>
                                <?php if(!empty($key->beneficiary)): ?>
                                    <tr>
                                        <td><?php echo e($key->beneficiary->first_name); ?> <?php echo e($key->beneficiary->last_name); ?></td>
                                        <td><?php echo e($key->beneficiary->unique_number); ?></td>
                                        <td><?php echo e($key->beneficiary->mobile); ?></td>
                                      
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-xs dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                    <?php echo e(trans('general.choose')); ?> <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <?php if(Sentinel::hasAccess('beneficiaries.view')): ?>
                                                        <li><a href="<?php echo e(url('beneficiary/'.$key->beneficiary->id.'/show')); ?>"><i
                                                                        class="fa fa-search"></i> <?php echo e(trans_choice('general.detail',2)); ?>

                                                            </a></li>
                                                    <?php endif; ?>
                                                    <?php if(Sentinel::hasAccess('beneficiaries.update')): ?>
                                                        <li><a href="<?php echo e(url('beneficiary/'.$key->beneficiary->id.'/edit')); ?>"><i
                                                                        class="fa fa-edit"></i> <?php echo e(trans('general.edit')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                    <?php if(Sentinel::hasAccess('beneficiaries.groups')): ?>
                                                        <li>
                                                            <a href="<?php echo e(url('beneficiary/group/'.$key->id.'/remove_beneficiary')); ?>"
                                                               class="delete"><i
                                                                        class="fa fa-trash"></i> <?php echo e(trans('general.remove')); ?>

                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->

            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="modal fade" id="addbeneficiary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">*</span></button>
                    <h4 class="modal-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?></h4>
                </div>
                <?php echo Form::open(array('url' => url('beneficiary/group/'.$beneficiary_group->id.'/add_beneficiary'),'method'=>'post')); ?>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <?php echo Form::label('beneficiary_id',trans_choice('general.beneficiary',1),array('class'=>' control-label')); ?>

                            <?php echo Form::select('beneficiary_id',$beneficiaries,null,array('class'=>' select2','placeholder'=>trans_choice('general.select',1),'required'=>'required')); ?>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"><?php echo e(trans_choice('general.save',1)); ?></button>
                    <button type="button" class="btn default"
                            data-dismiss="modal"><?php echo e(trans_choice('general.close',1)); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>