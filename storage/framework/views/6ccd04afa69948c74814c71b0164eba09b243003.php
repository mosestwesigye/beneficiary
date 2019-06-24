<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.edit',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?></h3>

        <div class="box-tools pull-right">

        </div>
    </div>
    <?php echo Form::open(array('url' => url('package/'.$package->id.'/update'), 'method' => 'post', 'class' => 'form-horizontal',"enctype"=>"multipart/form-data")); ?>

    <div class="box-body">
      <div class="form-group">
            <?php echo Form::label('beneficiary_id',trans_choice('general.beneficiary',1),array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::select('beneficiary_id',$beneficiaries,$package->beneficiary_id, array('class' => ' select2 form-control', 'placeholder'=>"Select",'required'=>'required')); ?>

            </div>
        </div>

        <hr>
        <p class="bg-green color-palette"><?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.fund',2)); ?>

            (<?php echo e(trans_choice('general.register',1)); ?> <?php echo e(trans_choice('general.fund',2)); ?>):</p>

        <p class="text-red"><b><?php echo e(trans_choice('general.mode',1)); ?> <?php echo e(trans_choice('general.payment',1)); ?>:</b></p>

        <div class="form-group">
            <?php echo Form::label('mode_of_payment',trans_choice('general.mode_of_payment',1),array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
              <?php echo Form::select('mode_of_payment',array('Cash'=>trans_choice('general.cash',1),'Bank'=>trans_choice('general.bank',1), 'Mobile Money'=>trans_choice('general.mobile_money',1)),'Cash', array('class' => 'form-control',)); ?>


            </div>
        </div>
        <hr>
        <p class="text-red"><b><?php echo e(trans_choice('general.package_amount',1)); ?>:</b></p>

        <div class="form-group" id="overrideDiv">
            <?php echo Form::label('package_amount',trans_choice('general.package_amount',1).' (Shs)',array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::text('package_amount',$package->package_amount, array('class' => 'form-control ','id'=>'package_amount')); ?>

            </div>

        </div>


        <p class="bg-navy color-palette"><?php echo e(trans_choice('general.beneficiary',2)); ?> (<?php echo e(trans_choice('general.item',2)); ?>):</p>

        <hr>
        <p class="text-red"><b><?php echo e(trans_choice('general.item',1)); ?>:</b></p>

        <div class="form-group" id="overrideDiv">
            <?php echo Form::label('item',trans_choice('general.item',1).' (Package Name)',array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::text('item',$package->item, array('class' => 'form-control ','id'=>'package_amount')); ?>

            </div>

        </div>

        <hr>
        <p class="text-red"><b><?php echo e(trans_choice('general.quantity',1)); ?>:</b></p>

        <div class="form-group">
            <?php echo Form::label('quantity',trans_choice('general.quantity',1).' (Package Quantity)',array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::text('quantity',$package->quantity, array('class' => 'form-control ','id'=>'package_amount')); ?>

            </div>

        </div>
        <hr>
        <p class="text-red"><b><?php echo e(trans_choice('general.unit',1)); ?>:</b></p>
        <div class="form-group">
            <?php echo Form::label('unit',trans_choice('general.unit',1),array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
              <?php echo Form::select('unit',array('kg'=>trans_choice('general.kg',1),'grams'=>trans_choice('general.grams',1)),'Cash', array('class' => 'form-control',)); ?>


            </div>
        </div>
        <hr>

        <p class="text-red"><b><?php echo e(trans_choice('general.description',1)); ?>:</b></p>
        <div class="form-group">
            <?php echo Form::label('description',trans_choice('general.description',2),array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::textarea('description',$package->description, array('class' => 'form-control', 'rows'=>"3")); ?>

            </div>

        </div>
        <hr>
        <div class="form-group">
          <?php echo Form::label('files',trans_choice('general.beneficiary_package',1).' '.trans_choice('general.file',2).'('.trans_choice('general.file',2).')',array('class'=>'col-sm-3 control-label')); ?>

            <div class="col-sm-6">
                <?php echo Form::file('files[]', array('class' => 'form-control', 'multiple'=>"multiple")); ?>

            </div>
            <div class="col-sm-9">
              <?php echo e(trans_choice('general.select_thirty_files',2)); ?>

              <?php foreach(unserialize($package->files) as $key=>$value): ?>
                  <span id="file_<?php echo e($key); ?>_span"><a href="<?php echo asset('uploads/'.$value); ?>"
                                                   target="_blank"><?php echo $value; ?></a> <button value="<?php echo e($key); ?>"
                                                                                              id="<?php echo e($key); ?>"
                                                                                              onclick="delete_file(this)"
                                                                                              type="button"
                                                                                              class="btn btn-danger btn-xs">
                          <i class="fa fa-trash"></i></button> </span><br>
              <?php endforeach; ?>
            </div>
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

<?php $__env->startSection('footer-scripts'); ?>
    <script>
        function delete_file(e) {
            var id = e.id;
            swal({
                title: 'Are you sure?',
                text: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok',
                cancelButtonText: 'Cancel'
            }).then(function () {
                $.ajax({
                    type: 'GET',
                    url: "<?php echo url('package/'.$package->id); ?>/delete_file?id=" + id,
                    success: function (data) {
                        $("#file_" + id + "_span").remove();
                        swal({
                            title: 'Deleted',
                            text: 'File successfully deleted',
                            type: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Ok',
                            timer: 2000
                        })
                    }
                });
            })

        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>