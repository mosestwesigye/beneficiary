<?php $__env->startSection('title'); ?>
    <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?></h3>

            <div class="box-tools pull-right">

            </div>
        </div>
        <?php echo Form::open(array('url' => url('asset/store'), 'method' => 'post','class'=>'', 'name' => 'form',"enctype"=>"multipart/form-data")); ?>

        <div class="box-body">
            <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.required',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

            <div class="form-group">
                <?php echo Form::label('asset_type_id',trans_choice('general.asset',1).' '.trans_choice('general.type',1),array('class'=>' control-label')); ?>


                <?php echo Form::select('asset_type_id',$types,null, array('class' => 'form-control','required'=>'required')); ?>


            </div>
            <div class="form-group">
                <?php echo Form::label('current_value',trans_choice('general.current',1).' '.trans_choice('general.value',1),array('class'=>'')); ?>

                <div class="col-sm-12">
                    <table width="100%" id="current_valuation" class="table table-bordered">
                        <tbody>
                        <tr>
                            <td style="width:5px" class="bg-gray padding"><b>#</b></td>
                            <td class="bg-gray padding"><b><?php echo e(trans_choice('general.date',1)); ?> <?php echo e(trans_choice('general.of',1)); ?> <?php echo e(trans_choice('general.valuation',1)); ?></b></td>
                            <td class="bg-gray padding"><b><?php echo e(trans_choice('general.value',1)); ?> <?php echo e(trans_choice('general.amount',1)); ?></b></td>
                        </tr>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>
                                <input type="text" name="asset_management_current_date[]"
                                       class="date-picker form-control is-datepick" id="inputAssetManagementDateCurrent"
                                       placeholder="yyyy-mm-dd" value="" required="">
                            </td>
                            <td>
                                <input type="text" name="asset_management_current_value[]"
                                       class="form-control decimal-2-places touchspin"
                                       id="inputAssetManagementCurrentValue"
                                       placeholder="" value="" required="">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <!--Hours and Earnings-->
                    <button type="button" class="btn btn-info margin" onclick="addRow()"><?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.row',1)); ?></button>
                    <button type="button" class="btn btn-info margin" onclick="deleteRow()"><?php echo e(trans_choice('general.delete',1)); ?> <?php echo e(trans_choice('general.row',1)); ?></button>
                </div>
            </div>
            <p class="">
                <small><?php echo e(trans_choice('general.add_asset_msg',1)); ?></small>
            </p>
            <p class="bg-navy disabled color-palette"><?php echo e(trans_choice('general.optional',1)); ?> <?php echo e(trans_choice('general.field',2)); ?></p>

            <div class="callout callout-warning no-margin">
                <p><?php echo e(trans_choice('general.add_asset_msg2',1)); ?></p>
            </div>
            <div class="form-group">
                <?php echo Form::label('purchase_date',trans_choice('general.purchase',1).' '.trans_choice('general.date',1),array('class'=>'')); ?>

                <?php echo Form::text('purchase_date',null, array('class' => 'form-control date-picker', 'placeholder'=>"",)); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('purchase_price',trans_choice('general.purchase',1).' '.trans_choice('general.price',1),array('class'=>'')); ?>

                <?php echo Form::text('purchase_price',null, array('class' => 'form-control touchspin', 'placeholder'=>"",)); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('replacement_value',trans_choice('general.replacement',1).' '.trans_choice('general.value',1),array('class'=>'')); ?>

                <?php echo Form::text('replacement_value',null, array('class' => 'form-control touchspin', 'placeholder'=>"",)); ?>

            </div>
            <div class="form-group">
                <?php echo Form::label('serial_number',trans_choice('general.serial_number',1),array('class'=>'')); ?>

                <?php echo Form::textarea('serial_number',null, array('class' => 'form-control')); ?>

            </div>
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
            bindDeactivate();

        })
        function addRow() {
            var fixed_count = 0;
            var table = document.getElementById("current_valuation");
            var rowCount = table.rows.length;
            if (rowCount < 100) {                            // limit the user from creating fields more than your limits
                var row = table.insertRow(rowCount);
                var colCount = table.rows[fixed_count].cells.length;
                if (colCount == 0) {
                    colCount = hiddenTable.rows[fixed_count].cells.length;
                }
                for (var i = 0; i < colCount; i++) {
                    var newcell = row.insertCell(i);
                    if (i == 0) {
                        newcell.innerHTML = rowCount;
                    }
                    else if (i == 1) {
                        newcell.innerHTML = "<input id=\"inputAssetManagementDateCurrent" + rowCount + "\" type=\"text\" placeholder=\"yyyy-mm-dd\" name=\"asset_management_current_date[]\" class=\"date-picker form-control\" value=\"\">";
                    }
                    else if (i == 2)
                        newcell.innerHTML = "<input id=\"inputAssetManagementCurrentValue" + rowCount + "\" type=\"text\"  placeholder=\"\" name=\"asset_management_current_value[]\" class=\"form-control touchspin\" value=\"\">";
                }
                bindDeactivate();
            } else {
                alert("Maximum Rows you can add is 100");

            }
        }
        function deleteRow() {
            var fixed_count = 2;
            var table = document.getElementById("current_valuation");
            var rowCount = table.rows.length;
            for (var i = rowCount - 1; i < rowCount; i++) {
                var row = table.rows[i];
                if (rowCount <= fixed_count) {               // limit the user from removing all the fields
                    break;
                }
                table.deleteRow(i);
                rowCount--;
                i--;
            }
        }
        function bindDeactivate() {
            $('.date-picker').datepicker({
                orientation: "left",
                autoclose: true,
                format: "yyyy-mm-dd"
            });
            $(".touchspin").TouchSpin({
                buttondown_class: 'btn blue',
                buttonup_class: 'btn blue',
                min: 0,
                max: 10000000000,
                step: 0.01,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 1,
                prefix: ''
            });
        }

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>