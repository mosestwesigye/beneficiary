<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/skins/_all-skins.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/custom.css')); ?>">
    <link href="<?php echo e(asset('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-toastr/toastr.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/select2/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/datatable/media/css/dataTables.bootstrap.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/css/buttons.dataTables.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/datatable/extensions/Buttons/css/buttons.bootstrap.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/datatable/extensions/Responsive/css/responsive.bootstrap.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/fancybox/jquery.fancybox.css')); ?>"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/datepicker/bootstrap-datepicker3.min.css')); ?>" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo e(asset('assets/plugins/iCheck/square/blue.css')); ?>" rel="stylesheet" type="text/css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery 2.2.3 -->
    <script src="<?php echo e(asset('assets/plugins/jQuery/jquery-2.2.3.min.js')); ?>"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?php echo e(asset('assets/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-toastr/toastr.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/jQueryUi/jquery-ui.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('assets/plugins/datepicker/bootstrap-datepicker.min.js')); ?>"
            type="text/javascript"></script>
    <?php /*Start Page header level scripts*/ ?>
    <?php echo $__env->yieldContent('page-header-scripts'); ?>
    <?php /*End Page level scripts*/ ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo e(url('/')); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b><?php echo e(\App\Models\Setting::where('setting_key','company_name')->first()->setting_value); ?></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b><?php echo e(\App\Models\Setting::where('setting_key','company_name')->first()->setting_value); ?></b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i>
                            <span class="hidden-xs"><?php echo e(Sentinel::getUser()->first_name); ?> <?php echo e(Sentinel::getUser()->last_name); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <i class="fa fa-user" style="font-size: 60px"></i>

                                <p>
                                    <?php echo e(Sentinel::getUser()->first_name); ?> <?php echo e(Sentinel::getUser()->last_name); ?>

                                    <small>Member since <?php echo e(Sentinel::getUser()->created_at); ?></small>
                                </p>
                            </li>

                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?php echo e(url('user/'.Sentinel::getUser()->id.'/profile')); ?>"
                                       class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?php echo e(url('logout')); ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->

    <?php echo $__env->make('left_menu.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- end Left side column. contains the logo and sidebar -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header" style="min-height: 30px">
            <h1>
                <?php echo $__env->yieldContent('title'); ?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('dashboard')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo $__env->yieldContent('title'); ?></li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php if(Session::has('flash_notification.message')): ?>
                <script>toastr.<?php echo e(Session::get('flash_notification.level')); ?>('<?php echo e(Session::get("flash_notification.message")); ?>', 'Response Status')</script>
            <?php endif; ?>
            <?php if(isset($msg)): ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e($msg); ?>

                </div>
            <?php endif; ?>
            <?php if(isset($error)): ?>
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo e($error); ?>

                </div>
            <?php endif; ?>
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach($errors->all() as $error): ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <?php echo $__env->yieldContent('content'); ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer hidden-print">
        <div class="pull-right hidden-xs">
            <b>Version</b> <?php echo e(\App\Models\Setting::where('setting_key','system_version')->first()->setting_value); ?>

        </div>
        <strong>Copyright &copy; <?php echo e(date("Y")); ?> <a
                    href="<?php echo e(\App\Models\Setting::where('setting_key','company_website')->first()->setting_value); ?>"><?php echo e(\App\Models\Setting::where('setting_key','company_name')->first()->setting_value); ?></a>.</strong>
        All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- FastClick -->
<script src="<?php echo e(asset('assets/plugins/fastclick/fastclick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/iCheck/icheck.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/moment/js/moment.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-touchspin/bootstrap.touchspin.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/tinymce/tinymce.min.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/fancybox/jquery.fancybox.js')); ?>"
        type="text/javascript"></script>
<script src="<?php echo e(asset('assets/plugins/jquery.numeric.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('assets/dist/js/app.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/select2/select2.min.js')); ?>"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo e(asset('assets/plugins/slimScroll/jquery.slimscroll.min.js')); ?>"></script>
<?php echo $__env->yieldContent('footer-scripts'); ?>
        <!-- ChartJS 1.0.1 -->
<script src="<?php echo e(asset('assets/dist/js/custom.js')); ?>"></script>

</body>
</html>