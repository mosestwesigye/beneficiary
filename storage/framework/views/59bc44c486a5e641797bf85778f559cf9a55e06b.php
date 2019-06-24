<?php $__env->startSection('title'); ?>
    <?php echo e(trans('general.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('current-page-title'); ?>
    <?php echo e(trans('general.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('current-page'); ?>
    <?php echo e(trans('general.dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.total',1)); ?>

                    <br><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Beneficiary::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
<div class="clearfix visible-sm-block"></div>

        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.total',1)); ?>

                    <br><?php echo e(trans_choice('general.branches',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Branch::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>



        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-map"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.total',1)); ?>

                    <br><?php echo e(trans_choice('general.countries',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Country::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-blue"><i class="fa fa-user"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.total',1)); ?>

                    <br><?php echo e(trans_choice('general.districts',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\District::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

<!--

        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.registered',1)); ?>

                    <br><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Beneficiary::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.registered',1)); ?>

                    <br><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Beneficiary::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-navy"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.registered',1)); ?>

                    <br><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Beneficiary::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if(Sentinel::hasAccess('dashboard.registered_borrowers')): ?>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-light-blue"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                <span class="info-box-text"><?php echo e(trans_choice('general.registered',1)); ?>

                    <br><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="info-box-number"><?php echo e(\App\Models\Beneficiary::count()); ?></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
-->
  </div>

    <script src="<?php echo e(asset('assets/plugins/amcharts/amcharts.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/amcharts/serial.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/amcharts/pie.js')); ?>"
            type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/amcharts/themes/light.js')); ?>"
            type="text/javascript"></script>
    <script>
        AmCharts.makeChart("loans_released_monthly", {
            "type": "serial",
            "theme": "light",
            "autoMargins": true,
            "marginLeft": 30,
            "marginRight": 8,
            "marginTop": 10,
            "marginBottom": 26,
            "fontFamily": 'Open Sans',
            "color": '#888',

            "dataProvider": <?php echo $loans_released_monthly; ?>,
            "valueAxes": [{
                "axisAlpha": 0,

            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b> [[value]]</b> [[additional]]</span>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#d1655d",
                "lineThickness": 4,
                "negativeLineColor": "#637bb6",
                "title": "Amount",
                "type": "smoothedLine",
                "valueField": "amount"
            }],
            "categoryField": "month",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "tickLength": 0,
                "labelRotation": 30,

            },


        });
        AmCharts.makeChart("loan_collections_monthly", {
            "type": "serial",
            "theme": "light",
            "autoMargins": true,
            "marginLeft": 30,
            "marginRight": 8,
            "marginTop": 10,
            "marginBottom": 26,
            "fontFamily": 'Open Sans',
            "color": '#888',

            "dataProvider": <?php echo $loan_collections_monthly; ?>,
            "valueAxes": [{
                "axisAlpha": 0,

            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b> [[value]]</b> [[additional]]</span>",
                "bullet": "round",
                "bulletSize": 8,
                "lineColor": "#3C8DBC",
                "lineThickness": 4,
                "negativeLineColor": "#637bb6",
                "title": "Amount",
                "type": "smoothedLine",
                "valueField": "amount"
            }],
            "categoryField": "month",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "tickLength": 0,
                "labelRotation": 30,

            },


        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>