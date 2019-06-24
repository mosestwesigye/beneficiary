<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <i class="fa fa-user" style="font-size: 60px"></i>
            </div>
            <div class="pull-left info">
                <p><?php echo e(Sentinel::getUser()->first_name); ?> <?php echo e(Sentinel::getUser()->last_name); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php if(!empty(\App\Models\Branch::find(session('branch_id')))): ?>
                <li class=" <?php if(Request::is('branch/*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(url('branch/change')); ?>" title="Click to change Branch">
                        <i class="fa fa-check"></i> <span
                                style="text-transform: uppercase"><?php echo e(\App\Models\Branch::find(session('branch_id'))->name); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <li class="<?php if(Request::is('dashboard')): ?> active <?php endif; ?>">
                <a href="<?php echo e(url('dashboard')); ?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo e(trans_choice('general.dashboard',1)); ?></span>
                </a>
            </li>
            <?php if(Sentinel::hasAccess('branches')): ?>
                <li class="treeview <?php if(Request::is('branch/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-briefcase"></i> <span><?php echo e(trans_choice('general.branch',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('branches.view')): ?>
                            <li><a href="<?php echo e(url('branch/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.branch',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('branches.create')): ?>
                            <li><a href="<?php echo e(url('branch/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.branch',1)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(Sentinel::hasAccess('beneficiaries')): ?>
                <li class="treeview <?php if(Request::is('beneficiary/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-users"></i> <span><?php echo e(trans_choice('general.beneficiary',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('beneficiaries.view')): ?>
                            <li><a href="<?php echo e(url('beneficiary/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.beneficiary',2)); ?>

                                </a></li>
                            <li>
                                <a href="<?php echo e(url('beneficiary/pending')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.beneficiary',2)); ?> <?php echo e(trans_choice('general.pending',1)); ?>

                                    <span class="pull-right-container">
                                        <span class="label label-danger pull-right"><?php echo e(\App\Models\Beneficiary::where('branch_id', session('branch_id'))->where('active',0)->count()); ?></span>
                                    </span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('beneficiaries.create')): ?>
                            <li><a href="<?php echo e(url('beneficiary/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('beneficiary.groups')): ?>
                            <li><a href="<?php echo e(url('beneficiary/group/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.group',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('beneficiary.groups')): ?>
                            <li><a href="<?php echo e(url('beneficiary/group/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary',1)); ?> <?php echo e(trans_choice('general.group',1)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


<!--
            <?php if(Sentinel::hasAccess('packages')): ?>
                <li class="treeview <?php if(Request::is('package/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-money"></i> <span><?php echo e(trans_choice('general.beneficiary_package',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('packages.view')): ?>
                            <li><a href="<?php echo e(url('package/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',2)); ?>

                                </a></li>

                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('packages.create')): ?>
                            <li><a href="<?php echo e(url('package/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('package.groups')): ?>
                            <li><a href="<?php echo e(url('package/group/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?> <?php echo e(trans_choice('general.group',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('package.groups')): ?>
                            <li><a href="<?php echo e(url('package/group/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.beneficiary_package',1)); ?> <?php echo e(trans_choice('general.group',1)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>


            <!--
            <?php if(Sentinel::hasAccess('repayments')): ?>
                <li class="treeview <?php if(Request::is('repayment/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-dollar"></i> <span><?php echo e(trans_choice('general.repayment',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('repayments.view')): ?>
                            <li><a href="<?php echo e(url('repayment/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.repayment',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('repayments.create')): ?>
                            <li><a href="<?php echo e(url('repayment/bulk/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.bulk',1)); ?> <?php echo e(trans_choice('general.repayment',2)); ?>

                                </a></li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
          -->
        <!--    <?php if(Sentinel::hasAccess('savings')): ?>
                <li class="treeview <?php if(Request::is('saving/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-bank"></i> <span><?php echo e(trans_choice('general.saving',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('savings.view')): ?>
                            <li><a href="<?php echo e(url('saving/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.account',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('savings.create')): ?>
                            <li><a href="<?php echo e(url('saving/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.account',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('savings.view')): ?>
                            <li><a href="<?php echo e(url('saving/savings_transaction/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.transaction',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('savings.products')): ?>
                            <li><a href="<?php echo e(url('saving/savings_product/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.product',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('savings.fees')): ?>
                            <li><a href="<?php echo e(url('saving/savings_fee/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.saving',2)); ?> <?php echo e(trans_choice('general.fee',2)); ?>

                                </a></li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>

          -->
        <!--    <?php if(Sentinel::hasAccess('settings')): ?>
                <li class="treeview <?php if(Request::is('capital/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-bookmark"></i> <span><?php echo e(trans_choice('general.capital',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('settings')): ?>
                            <li><a href="<?php echo e(url('capital/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.capital',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('settings')): ?>
                            <li><a href="<?php echo e(url('capital/bank/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.bank',1)); ?> <?php echo e(trans_choice('general.account',2)); ?>

                                </a></li>
                        <?php endif; ?>

                    </ul>
                </li>
            <?php endif; ?>
          -->
          <!--  <?php if(Sentinel::hasAccess('payroll')): ?>
                <li class="treeview <?php if(Request::is('payroll/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-paypal"></i> <span><?php echo e(trans_choice('general.payroll',1)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('payroll.view')): ?>
                            <li><a href="<?php echo e(url('payroll/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.payroll',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('payroll.create')): ?>
                            <li><a href="<?php echo e(url('payroll/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.payroll',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('payroll.update')): ?>
                            <li><a href="<?php echo e(url('payroll/template')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',1)); ?> <?php echo e(trans_choice('general.payroll',1)); ?> <?php echo e(trans_choice('general.template',2)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
          -->
        <!--    <?php if(Sentinel::hasAccess('expenses')): ?>
                <li class="treeview <?php if(Request::is('expense/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-share"></i> <span><?php echo e(trans_choice('general.expense',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('expenses.view')): ?>
                            <li><a href="<?php echo e(url('expense/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.expense',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('expenses.create')): ?>
                            <li><a href="<?php echo e(url('expense/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.expense',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('expenses.create')): ?>
                            <li><a href="<?php echo e(url('expense/type/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.expense',1)); ?> <?php echo e(trans_choice('general.type',2)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
          -->
      <!--      <?php if(Sentinel::hasAccess('other_income')): ?>
                <li class="treeview <?php if(Request::is('other_income/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-plus"></i> <span><?php echo e(trans_choice('general.other_income',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('other_income.view')): ?>
                            <li><a href="<?php echo e(url('other_income/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.other_income',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('other_income.create')): ?>
                            <li><a href="<?php echo e(url('other_income/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.other_income',1)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('other_income.create')): ?>
                            <li><a href="<?php echo e(url('other_income/type/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.other_income',1)); ?> <?php echo e(trans_choice('general.type',2)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
          -->
      <!--      <?php if(Sentinel::hasAccess('collateral')): ?>
                <li class="treeview <?php if(Request::is('collateral/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-list"></i> <span><?php echo e(trans_choice('general.collateral',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('collateral.view')): ?>
                            <li><a href="<?php echo e(url('collateral/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.collateral',2)); ?> <?php echo e(trans_choice('general.register',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('collateral.create')): ?>
                            <li><a href="<?php echo e(url('collateral/type/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.collateral',2)); ?> <?php echo e(trans_choice('general.type',2)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>

          -->
          <!--  <?php if(Sentinel::hasAccess('reports')): ?>
                <li class="treeview <?php if(Request::is('report/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-bar-chart"></i> <span><?php echo e(trans_choice('general.report',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('report/cash_flow')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.cash_flow',2)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/profit_loss')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.profit_loss',2)); ?>

                            </a></li>

                        <li><a href="<?php echo e(url('report/collection')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.collection',2)); ?> <?php echo e(trans_choice('general.report',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/balance_sheet')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.balance',1)); ?> <?php echo e(trans_choice('general.sheet',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/loan_list')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.list',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/loan_balance')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.balance',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/loan_classification')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.classification',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/loan_transaction')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.loan',1)); ?> <?php echo e(trans_choice('general.transaction',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('report/loan_projection')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.collection',1)); ?> <?php echo e(trans_choice('general.projection',1)); ?>

                            </a></li>
                    </ul>
                </li>
            <?php endif; ?>
          <!--  <?php if(Sentinel::hasAccess('communication')): ?>
                <li class="treeview <?php if(Request::is('asset/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-briefcase"></i> <span><?php echo e(trans_choice('general.asset',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('asset/data')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',1)); ?> <?php echo e(trans_choice('general.asset',2)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('asset/create')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('asset/type/data')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.manage',1)); ?> <?php echo e(trans_choice('general.asset',1)); ?> <?php echo e(trans_choice('general.type',2)); ?>

                            </a></li>
                    </ul>
                </li>
            <?php endif; ?>
          -->
          <!--  <?php if(Sentinel::hasAccess('communication')): ?>
                <li class="treeview <?php if(Request::is('communication/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-envelope"></i> <span><?php echo e(trans_choice('general.communication',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="<?php echo e(url('communication/email')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.email',1)); ?>

                            </a></li>
                        <li><a href="<?php echo e(url('communication/sms')); ?>"><i
                                        class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.sms',2)); ?>

                            </a></li>
                    </ul>
                </li>
            <?php endif; ?>
          -->
            <?php if(Sentinel::hasAccess('custom_fields')): ?>
                <li class="treeview <?php if(Request::is('custom_field/*')): ?> active <?php endif; ?>">
                    <a href="#">
                        <i class="fa fa-users"></i> <span><?php echo e(trans_choice('general.custom_field',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('custom_fields.view')): ?>
                            <li><a href="<?php echo e(url('custom_field/data')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.custom_field',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('custom_fields.create')): ?>
                            <li><a href="<?php echo e(url('custom_field/create')); ?>"><i
                                            class="fa fa-circle-o"></i> <?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.custom_field',1)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(Sentinel::hasAccess('users')): ?>
                <li class="treeview <?php if(Request::is('user/*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(url('user/data')); ?>">
                        <i class="fa fa-users"></i> <span><?php echo e(trans_choice('general.user',2)); ?></span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <?php if(Sentinel::hasAccess('users.view')): ?>
                            <li><a href="<?php echo e(url('user/data')); ?>">
                                    <i class="fa fa-circle-o"></i>
                                    <span><?php echo e(trans_choice('general.view',2)); ?> <?php echo e(trans_choice('general.user',2)); ?></span>
                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('users.roles')): ?>
                            <li><a href="<?php echo e(url('user/role/data')); ?>"><i
                                            class="fa fa-circle-o"></i><?php echo e(trans_choice('general.manage',2)); ?> <?php echo e(trans_choice('general.role',2)); ?>

                                </a></li>
                        <?php endif; ?>
                        <?php if(Sentinel::hasAccess('users.create')): ?>
                            <li><a href="<?php echo e(url('user/create')); ?>"><i
                                            class="fa fa-circle-o"></i><?php echo e(trans_choice('general.add',2)); ?> <?php echo e(trans_choice('general.user',2)); ?>

                                </a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(Sentinel::hasAccess('audit_trail')): ?>
                <li class="<?php if(Request::is('audit_trail/*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(url('audit_trail/data')); ?>">
                        <i class="fa fa-area-chart"></i> <span><?php echo e(trans_choice('general.audit_trail',2)); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(Sentinel::hasAccess('settings')): ?>
                <li class="<?php if(Request::is('setting/*')): ?> active <?php endif; ?>">
                    <a href="<?php echo e(url('setting/data')); ?>">
                        <i class="fa fa-cog"></i> <span><?php echo e(trans_choice('general.setting',2)); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
