<?php $__env->startSection('title'); ?><?php echo e(trans_choice('general.edit',1)); ?> <?php echo e(trans_choice('general.payroll',1)); ?> <?php echo e(trans_choice('general.template',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.edit',1)); ?> <?php echo e(trans_choice('general.payroll',1)); ?> <?php echo e(trans_choice('general.template',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('payroll/template/'.$id.'/update'), 'method' => 'post', 'class' => 'form-horizontal')); ?>

        <div class="box-body">
            <p>You can edit the template by changing the fields and adding or deleting rows.</p>

            <div class="row">
                <div class="col-md-6">
                    <?php foreach($top_left as $key): ?>
                        <div class="form-group" id="<?php echo e($key->id); ?>">
                            <div class="col-sm-10">
                                <?php echo Form::text($key->id,$key->name, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                            </div>
                            <div class="col-sm-2">
                                <?php if($key->is_default==0): ?>
                                    <a href="<?php echo e(url('payroll/template/'.$id.'/delete_meta?action=delete_meta&meta_id='.$key->id)); ?>"
                                       class="deleteMeta" div-id="<?php echo e($key->id); ?>"><i class="fa fa-trash"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group">
                        <button type="button" class="btn btn-info margin" data-toggle="modal" data-target="#addRow"
                                data-position="top_left"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?>

                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="">
                        <div class="col-sm-10">
                            <label><?php echo e(trans_choice('general.payroll',1)); ?> <?php echo e(trans_choice('general.date',1)); ?></label>
                        </div>
                    </div>
                    <?php foreach($top_right as $key): ?>
                        <div class="form-group" id="<?php echo e($key->id); ?>">
                            <div class="col-sm-10">
                                <?php echo Form::text($key->id,$key->name, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                            </div>
                            <div class="col-sm-2">
                                <?php if($key->is_default==0): ?>
                                    <a href="<?php echo e(url('payroll/template/'.$id.'/delete_meta?action=delete_meta&meta_id='.$key->id)); ?>"
                                       class="deleteMeta" div-id="<?php echo e($key->id); ?>"><i class="fa fa-trash"></i> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="form-group">
                        <button type="button" class="btn btn-info margin" data-toggle="modal" data-target="#addRow"
                                data-position="top_right"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?>

                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-solid box-primary">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo e(trans_choice('general.addition',2)); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php foreach($bottom_left as $key): ?>
                                <div class="form-group" id="<?php echo e($key->id); ?>">
                                    <div class="col-sm-10">
                                        <?php echo Form::text($key->id,$key->name, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                                    </div>
                                    <div class="col-sm-2">
                                        <?php if($key->is_default==0): ?>
                                            <a href="<?php echo e(url('payroll/template/'.$id.'/delete_meta?action=delete_meta&meta_id='.$key->id)); ?>"
                                               class="deleteMeta" div-id="<?php echo e($key->id); ?>"><i class="fa fa-trash"></i> </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-info margin" data-toggle="modal"
                                        data-target="#addRow"
                                        data-position="bottom_left"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?>

                                </button>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="box box-solid box-danger">
                        <div class="box-header">
                            <h3 class="box-title"><?php echo e(trans_choice('general.deduction',2)); ?></h3>
                        </div>
                        <div class="box-body">
                            <?php foreach($bottom_right as $key): ?>
                                <div class="form-group" id="<?php echo e($key->id); ?>">
                                    <div class="col-sm-10">
                                        <?php echo Form::text($key->id,$key->name, array('class' => 'form-control', 'placeholder'=>"",'required'=>'required')); ?>

                                    </div>
                                    <div class="col-sm-2">
                                        <?php if($key->is_default==0): ?>
                                            <a href="<?php echo e(url('payroll/template/'.$id.'/delete_meta?action=delete_meta&meta_id='.$key->id)); ?>"
                                               class="deleteMeta" div-id="<?php echo e($key->id); ?>"><i class="fa fa-trash"></i> </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <button type="button" class="btn btn-info margin" data-toggle="modal"
                                        data-target="#addRow"
                                        data-position="bottom_right"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?>

                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><?php echo e(trans_choice('general.save',1)); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
    <!-- /.box -->
    <div class="modal fade" id="addRow">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">*</span></button>
                    <h4 class="modal-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?></h4>
                </div>
                <?php echo Form::open(array('url' => url('payroll/template/'.$id.'/add_row'),'class'=>'','id'=>'paypalForm')); ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="">
                            <input name="position" value="" type="hidden" id="position">

                            <div class="form-group">
                                <?php echo Form::label( 'name',trans_choice('general.name',1),array('class'=>' control-label')); ?>

                                <?php echo Form::text('name','',array('class'=>'form-control','required'=>'required','id'=>'amount')); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info"><?php echo e(trans_choice('general.submit',1)); ?></button>
                    <button type="button" class="btn default" data-dismiss="modal"><?php echo e(trans_choice('general.close',1)); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-scripts'); ?>
    <script>
        $(document).ready(function () {
            $('.deleteMeta').on('click', function (e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var div_id = $(this).attr('div-id');
                swal({
                    title: 'Are you sure?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'Cancel'
                }).then(function () {
                    $.ajax({
                        type: 'GET',
                        url: href,
                        success: function (data) {
                            $('#' + div_id).hide();
                        }
                    });
                    swal({title: "Deleted!", text: "Field has been deleted.", type: "success", timer: 2000});
                })
            });
        });
        $('#addRow').on('shown.bs.modal', function (e) {
            var position = $(e.relatedTarget).data('position');
            $(e.currentTarget).find("#position").val(position);
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>