<?php
if(version_compare(PHP_VERSION, '7.3.5', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//route model binding
Route::model('custom_field', 'App\Models\CustomField');
Route::model('beneficiary', 'App\Models\Beneficiary');
Route::model('setting', 'App\Models\Setting');
Route::model('status', 'App\Models\packageStatus');
Route::model('repayment', 'App\Models\packageRepayment');
Route::model('package', 'App\Models\package');
Route::model('user', 'App\Models\User');
Route::model('expense', 'App\Models\Expense');
Route::model('expense_type', 'App\Models\ExpenseType');
Route::model('collateral', 'App\Models\Collateral');
Route::model('collateral_type', 'App\Models\CollateralType');
Route::model('other_income', 'App\Models\OtherIncome');
Route::model('other_income_type', 'App\Models\OtherIncomeType');
Route::model('payroll', 'App\Models\Payroll');
Route::model('permission', 'App\Models\Permission');
Route::model('saving', 'App\Models\Saving');
Route::model('savings_product', 'App\Models\SavingProduct');
Route::model('savings_fee', 'App\Models\SavingFee');
Route::model('savings_transaction', 'App\Models\SavingTransaction');
Route::model('asset', 'App\Models\Asset');
Route::model('asset_type', 'App\Models\AssetType');
Route::model('asset_valuation', 'App\Models\AssetValuation');
Route::model('capital', 'App\Models\Capital');
Route::model('guarantor', 'App\Models\Guarantor');
Route::model('beneficiary_group', 'App\Models\BeneficiaryGroup');
Route::model('provision', 'App\Models\ProvisionRate');
Route::model('bank', 'App\Models\BankAccount');
Route::model('branch', 'App\Models\Branch');
//route for installation
Route::get('install', 'InstallController@index');
Route::group(['prefix' => 'install'], function () {
    Route::get('start', 'InstallController@index');
    Route::get('requirements', 'InstallController@requirements');
    Route::get('permissions', 'InstallController@permissions');
    Route::any('database', 'InstallController@database');
    Route::any('installation', 'InstallController@installation');
    Route::get('complete', 'InstallController@complete');

});
//cron route
Route::get('cron', 'CronController@index');
Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    return redirect('/');

});
Route::get('/config-cache', function () {
    Artisan::call('config:cache');
    return redirect('/');
});
Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::get('client', 'HomeController@clientLogin');
Route::post('client', 'HomeController@processClientLogin');
Route::get('client_logout', 'HomeController@clientLogout');
Route::get('admin', 'HomeController@adminLogin');

Route::get('logout', 'HomeController@logout');
Route::post('login', 'HomeController@processLogin');
Route::post('register', 'HomeController@register');
Route::post('reset', 'HomeController@passwordReset');
Route::get('reset/{id}/{code}', 'HomeController@confirmReset');
Route::post('reset/{id}/{code}', 'HomeController@completeReset');
Route::get('check/{id}', 'HomeController@checkStatus');
Route::get('no_branch', [
    'middleware' => 'sentinel',
    function () {
        $error = "You don't have permission to access any branch. Please contact your system administrator.";
        return view('no_branch', compact('error'));
    }
]);


Route::get('dashboard', [
    'middleware' => ['sentinel', 'branch'],
    function () {

        return view('dashboard');
    }
]);
//route for custom fields
Route::group(['prefix' => 'custom_field'], function () {

    Route::get('data', 'CustomFieldController@index');
    Route::get('create', 'CustomFieldController@create');
    Route::post('store', 'CustomFieldController@store');
    Route::get('{custom_field}/show', 'CustomFieldController@show');
    Route::get('{custom_field}/edit', 'CustomFieldController@edit');
    Route::post('{id}/update', 'CustomFieldController@update');
    Route::get('{id}/delete', 'CustomFieldController@delete');

});
//route for beneficiary
Route::group(['prefix' => 'beneficiary'], function () {

    Route::get('data', 'BeneficiaryController@index');
    Route::get('pending', 'BeneficiaryController@pending');
    Route::get('create', 'BeneficiaryController@create');
    Route::post('store', 'BeneficiaryController@store');
    Route::get('{beneficiary}/show', 'BeneficiaryController@show');
    Route::get('{beneficiary}/edit', 'BeneficiaryController@edit');
    Route::post('{id}/update', 'BeneficiaryController@update');
    Route::get('{id}/delete', 'BeneficiaryController@delete');
    Route::get('{id}/approve', 'BeneficiaryController@approve');
    Route::get('{id}/decline', 'BeneficiaryController@decline');
    Route::get('{id}/delete_file', 'BeneficiaryController@deleteFile');
    Route::get('{id}/blacklist', 'BeneficiaryController@blacklist');
    Route::get('{id}/unblacklist', 'BeneficiaryController@unBlacklist');
    //borrower group
    Route::get('group/data', 'BeneficiaryGroupController@index');
    Route::get('group/create', 'BeneficiaryGroupController@create');
    Route::post('group/store', 'BeneficiaryGroupController@store');
    Route::get('group/{beneficiary_group}/show', 'BeneficiaryGroupController@show');
    Route::get('group/{beneficiary_group}/edit', 'BeneficiaryGroupController@edit');
    Route::post('group/{id}/update', 'BeneficiaryGroupController@update');
    Route::get('group/{id}/delete', 'BeneficiaryGroupController@delete');
    Route::post('group/{id}/add_beneficiary', 'BeneficiaryGroupController@addBeneficiary');
    Route::get('group/{id}/remove_beneficiary', 'BeneficiaryGroupController@removeBeneficiary');
});

//route for beneficiary package
Route::group(['prefix' => 'package'], function () {

    Route::get('data', 'PackageController@index');
    Route::get('pending', 'PackageController@pending');
    Route::get('create', 'PackageController@create');
    Route::post('store', 'PackageController@store');
    Route::get('{package}/show', 'PackageController@show');
    Route::get('{package}/edit', 'PackageController@edit');
    Route::post('{id}/update', 'PackageController@update');
    Route::get('{id}/delete', 'PackageController@delete');
    Route::get('{id}/approve', 'PackageController@approve');
    Route::get('{id}/decline', 'PackageController@decline');
    Route::get('{id}/delete_file', 'PackageController@deleteFile');
    Route::get('{id}/blacklist', 'PackageController@blacklist');
    Route::get('{id}/unblacklist', 'PackageController@unBlacklist');
    Route::get('{beneficiary}/beneficiary_statement/print', 'PackageController@printBorrowerStatement');
    Route::get('{beneficiary}/beneficiary_statement/pdf', 'PackageController@pdfBorrowerStatement');
    Route::get('{beneficiary}/beneficiary_statement/email', 'PackageController@emailBorrowerStatement');
    //package group
    Route::get('group/data', 'PackageGroupController@index');
    Route::get('group/create', 'PackageGroupController@create');
    Route::post('group/store', 'PackageGroupController@store');
    Route::get('group/{package_group}/show', 'PackageGroupController@show');
    Route::get('group/{package_group}/edit', 'PackageGroupController@edit');
    Route::post('group/{id}/update', 'PackageGroupController@update');
    Route::get('group/{id}/delete', 'PackageGroupController@delete');
    Route::post('group/{id}/add_package', 'PackageGroupController@addpackage');
    Route::get('group/{id}/remove_package', 'PackageGroupController@removepackage');
});


Route::get('update',
    function () {
        \Illuminate\Support\Facades\Artisan::call('migrate');
        \Laracasts\Flash\Flash::success("Successfully Updated");
        return redirect('/');
    });
Route::group(['prefix' => 'update'], function () {
    Route::get('download', 'UpdateController@download');
    Route::get('install', 'UpdateController@install');
    Route::get('clean', 'UpdateController@clean');
    Route::get('finish', 'UpdateController@finish');
});
Route::get('fix', 'UpdateController@fix');
//route for setting
Route::group(['prefix' => 'setting'], function () {
    Route::get('data', 'SettingController@index');
    Route::post('update', 'SettingController@update');
    Route::get('update_system', 'SettingController@updateSystem');
});
//route for user
Route::group(['prefix' => 'user'], function () {
    Route::get('data', 'UserController@index');
    Route::get('create', 'UserController@create');
    Route::post('store', 'UserController@store');
    Route::get('{user}/edit', 'UserController@edit');
    Route::get('{user}/show', 'UserController@show');
    Route::post('{id}/update', 'UserController@update');
    Route::get('{id}/delete', 'UserController@delete');
    Route::get('{id}/profile', 'UserController@profile');
    Route::post('{id}/profile', 'UserController@profileUpdate');
    //manage permissions
    Route::get('permission/data', 'UserController@indexPermission');
    Route::get('permission/create', 'UserController@createPermission');
    Route::post('permission/store', 'UserController@storePermission');
    Route::get('permission/{permission}/edit', 'UserController@editPermission');
    Route::post('permission/{id}/update', 'UserController@updatePermission');
    Route::get('permission/{id}/delete', 'UserController@deletePermission');
    //manage roles
    Route::get('role/data', 'UserController@indexRole');
    Route::get('role/create', 'UserController@createRole');
    Route::post('role/store', 'UserController@storeRole');
    Route::get('role/{id}/edit', 'UserController@editRole');
    Route::post('role/{id}/update', 'UserController@updateRole');
    Route::get('role/{id}/delete', 'UserController@deleteRole');
});

    //status routes
    Route::get('package_status/data', 'packageStatusController@index');
    Route::get('package_status/create', 'packageStatusController@create');
    Route::post('package_status/store', 'packageStatusController@store');
    Route::get('package_status/{package_status}/edit', 'packageStatusController@edit');
    Route::get('package_status/{package_status}/show', 'packageStatusController@show');
    Route::post('package_status/{id}/update', 'packageStatusController@update');
    Route::get('package_status/{id}/delete', 'packageStatusController@delete');

//route for payroll
Route::group(['prefix' => 'payroll'], function () {
    Route::get('data', 'PayrollController@index');
    Route::get('create', 'PayrollController@create');
    Route::post('store', 'PayrollController@store');
    Route::get('{payroll}/show', 'PayrollController@show');
    Route::get('{payroll}/edit', 'PayrollController@edit');
    Route::post('{id}/update', 'PayrollController@update');
    Route::get('{id}/delete', 'PayrollController@delete');
    Route::get('getUser/{id}', 'PayrollController@getUser');
    Route::get('{payroll}/payslip', 'PayrollController@pdfPayslip');
    Route::get('{user}/data', 'PayrollController@staffPayroll');
//template
    Route::any('template', 'PayrollController@indexTemplate');
    Route::get('template/{id}/edit', 'PayrollController@editTemplate');
    Route::post('template/{id}/update', 'PayrollController@updateTemplate');
    Route::get('template/{id}/delete_meta', 'PayrollController@deleteTemplateMeta');
    Route::post('template/{id}/add_row', 'PayrollController@addTemplateRow');
});
//route for expenses
Route::group(['prefix' => 'expense'], function () {
    Route::get('data', 'ExpenseController@index');
    Route::get('create', 'ExpenseController@create');
    Route::post('store', 'ExpenseController@store');
    Route::get('{expense}/edit', 'ExpenseController@edit');
    Route::get('{expense}/show', 'ExpenseController@show');
    Route::post('{id}/update', 'ExpenseController@update');
    Route::get('{id}/delete', 'ExpenseController@delete');
    Route::get('{id}/delete_file', 'ExpenseController@deleteFile');

    //expense types
    Route::get('type/data', 'ExpenseController@indexType');
    Route::get('type/create', 'ExpenseController@createType');
    Route::post('type/store', 'ExpenseController@storeType');
    Route::get('type/{expense_type}/edit', 'ExpenseController@editType');
    Route::get('type/{expense_type}/show', 'ExpenseController@showType');
    Route::post('type/{id}/update', 'ExpenseController@updateType');
    Route::get('type/{id}/delete', 'ExpenseController@deleteType');
});
//route for other income
Route::group(['prefix' => 'other_income'], function () {
    Route::get('data', 'OtherIncomeController@index');
    Route::get('create', 'OtherIncomeController@create');
    Route::post('store', 'OtherIncomeController@store');
    Route::get('{other_income}/edit', 'OtherIncomeController@edit');
    Route::get('{other_income}/show', 'OtherIncomeController@show');
    Route::post('{id}/update', 'OtherIncomeController@update');
    Route::get('{id}/delete', 'OtherIncomeController@delete');
    Route::get('{id}/delete_file', 'OtherIncomeController@deleteFile');
    //income types
    Route::get('type/data', 'OtherIncomeController@indexType');
    Route::get('type/create', 'OtherIncomeController@createType');
    Route::post('type/store', 'OtherIncomeController@storeType');
    Route::get('type/{other_income_type}/edit', 'OtherIncomeController@editType');
    Route::get('type/{other_income_type}/show', 'OtherIncomeController@showType');
    Route::post('type/{id}/update', 'OtherIncomeController@updateType');
    Route::get('type/{id}/delete', 'OtherIncomeController@deleteType');
});
//route for collateral
Route::group(['prefix' => 'collateral'], function () {
    Route::get('data', 'CollateralController@index');
    Route::get('{id}/create', 'CollateralController@create');
    Route::post('{package}/store', 'CollateralController@store');
    Route::get('{collateral}/edit', 'CollateralController@edit');
    Route::get('{collateral}/show', 'CollateralController@show');
    Route::post('{id}/update', 'CollateralController@update');
    Route::get('{id}/delete', 'CollateralController@delete');
    Route::get('{id}/delete_file', 'CollateralController@deleteFile');
    // types
    Route::get('type/data', 'CollateralController@indexType');
    Route::get('type/fix/create', 'CollateralController@createType');
    Route::post('type/fix/store', 'CollateralController@storeType');
    Route::get('type/{collateral_type}/edit', 'CollateralController@editType');
    Route::get('type/{collateral_type}/show', 'CollateralController@showType');
    Route::post('type/{id}/update', 'CollateralController@updateType');
    Route::get('type/{id}/delete', 'CollateralController@deleteType');
});
//route for reports
Route::group(['prefix' => 'report'], function () {
    Route::any('cash_flow', 'ReportController@cash_flow');
    Route::any('profit_loss', 'ReportController@profit_loss');
    Route::any('collection', 'ReportController@collection_report');
    Route::any('package_product', 'ReportController@package_product');
    Route::any('balance_sheet', 'ReportController@balance_sheet');
    Route::any('package_list', 'ReportController@package_list');
    Route::any('package_balance', 'ReportController@package_balance');
    Route::any('package_arrears', 'ReportController@package_arrears');
    Route::any('package_transaction', 'ReportController@package_transaction');
    Route::any('package_classification', 'ReportController@package_classification');
    Route::any('package_projection', 'ReportController@package_projection');

});
//route for communication
Route::group(['prefix' => 'communication'], function () {
    Route::get('email', 'CommunicationController@indexEmail');
    Route::get('sms', 'CommunicationController@indexSms');
    Route::get('email/create', 'CommunicationController@createEmail');
    Route::post('email/store', 'CommunicationController@storeEmail');
    Route::get('email/{id}/delete', 'CommunicationController@deleteEmail');
    Route::get('sms/create', 'CommunicationController@createSms');
    Route::post('sms/store', 'CommunicationController@storeSms');
    Route::get('sms/{id}/delete', 'CommunicationController@deleteSms');

});
//routes for clients

Route::get('client_dashboard', 'ClientController@clientDashboard');
Route::get('client_profile', 'ClientController@clientProfile');
Route::post('client_register', 'ClientController@processClientRegister');
Route::post('client_profile', 'ClientController@processClientProfile');
Route::group(['prefix' => 'client'], function () {
    Route::get('application/data', 'ClientController@indexApplication');
    Route::get('application/create', 'ClientController@createApplication');
    Route::get('application/{package_application}/show', 'ClientController@showApplication');
    Route::get('application/{package_application}/guarantor/create', 'ClientController@createGuarantor');
    Route::post('application/{package_application}/guarantor/store', 'ClientController@storeGuarantor');
    Route::post('application/store', 'ClientController@storeApplication');
    Route::get('guarantor/data', 'ClientController@indexGuarantor');
    Route::get('guarantor/{id}/decline', 'ClientController@declineGuarantor');
    Route::post('guarantor/{id}/accept', 'ClientController@acceptGuarantor');
    Route::get('package/{package}/show', 'ClientController@showpackage');
    Route::get('package/{package}/pay', 'ClientController@pay');
    Route::post('package/{package}/pay/paynow', 'ClientController@paynow');
    Route::any('package/{package}/pay/paynow/return', 'ClientController@paynowReturn');
    Route::any('package/{package}/pay/paynow/result', 'ClientController@paynowResult');
    Route::any('package/{package}/pay/paypal/done', 'ClientController@paypalDone');
    Route::any('package/pay/paypal/ipn', 'ClientController@paypalIPN');
    Route::get('saving/show', 'ClientController@showSaving');
    Route::get('saving/{saving}/statement/print', 'ClientController@printSavingStatement');
    Route::get('saving/{saving}/statement/pdf', 'ClientController@pdfSavingStatement');
    Route::get('saving/{saving}/pay', 'ClientController@paySaving');
    Route::post('saving/{saving}/pay/paynow', 'ClientController@paynowSaving');
    Route::any('saving/{saving}/pay/paynow/return', 'ClientController@paynowReturnSaving');
    Route::any('saving/{saving}/pay/paynow/result', 'ClientController@paynowResultSaving');
    Route::any('saving/{saving}/pay/paypal/done', 'ClientController@paypalDoneSaving');
    Route::any('saving/pay/paypal/ipn', 'ClientController@paypalIPNSaving');
});
//route for savings
Route::group(['prefix' => 'saving'], function () {
    Route::get('data', 'SavingController@index');
    Route::get('create', 'SavingController@create');
    Route::post('store', 'SavingController@store');
    Route::get('{saving}/edit', 'SavingController@edit');
    Route::get('{saving}/show', 'SavingController@show');
    Route::post('{id}/update', 'SavingController@update');
    Route::get('{id}/delete', 'SavingController@delete');
    Route::get('{saving}/statement/print', 'SavingController@printStatement');
    Route::get('{saving}/statement/pdf', 'SavingController@pdfStatement');
    Route::get('{saving}/transfer/create', 'SavingController@transfer');
    Route::post('{saving}/transfer/store', 'SavingController@storeTransfer');
    //saving products
    Route::get('savings_product/data', 'SavingProductController@index');
    Route::get('savings_product/create', 'SavingProductController@create');
    Route::post('savings_product/store', 'SavingProductController@store');
    Route::get('savings_product/{savings_product}/edit', 'SavingProductController@edit');
    Route::post('savings_product/{id}/update', 'SavingProductController@update');
    Route::get('savings_product/{id}/delete', 'SavingProductController@delete');
    //saving fees
    Route::get('savings_fee/data', 'SavingFeeController@index');
    Route::get('savings_fee/create', 'SavingFeeController@create');
    Route::post('savings_fee/store', 'SavingFeeController@store');
    Route::get('savings_fee/{savings_fee}/edit', 'SavingFeeController@edit');
    Route::post('savings_fee/{id}/update', 'SavingFeeController@update');
    Route::get('savings_fee/{id}/delete', 'SavingFeeController@delete');
    //saving transactions
    Route::get('savings_transaction/data', 'SavingTransactionController@index');
    Route::get('{saving}/savings_transaction/create', 'SavingTransactionController@create');
    Route::post('{saving}/savings_transaction/store', 'SavingTransactionController@store');
    Route::get('{saving}/savings_transaction/{savings_transaction}/edit', 'SavingTransactionController@edit');
    Route::post('{saving}/savings_transaction/{id}/update', 'SavingTransactionController@update');
    Route::get('{saving}/savings_transaction/{id}/delete', 'SavingTransactionController@delete');
});
//routes for assets
Route::group(['prefix' => 'asset'], function () {
    Route::get('data', 'AssetController@index');
    Route::get('create', 'AssetController@create');
    Route::post('store', 'AssetController@store');
    Route::get('{asset}/edit', 'AssetController@edit');
    Route::get('{asset}/show', 'AssetController@show');
    Route::post('{id}/update', 'AssetController@update');
    Route::get('{id}/delete', 'AssetController@delete');
    Route::get('{id}/delete_file', 'AssetController@deleteFile');

    //expense types
    Route::get('type/data', 'AssetController@indexType');
    Route::get('type/create', 'AssetController@createType');
    Route::post('type/store', 'AssetController@storeType');
    Route::get('type/{asset_type}/edit', 'AssetController@editType');
    Route::get('type/{asset_type}/show', 'AssetController@showType');
    Route::post('type/{id}/update', 'AssetController@updateType');
    Route::get('type/{id}/delete', 'AssetController@deleteType');
});
//route for capital
Route::group(['prefix' => 'capital'], function () {
    Route::get('data', 'CapitalController@index');
    Route::get('create', 'CapitalController@create');
    Route::post('store', 'CapitalController@store');
    Route::get('{capital}/edit', 'CapitalController@edit');
    Route::get('{id}/show', 'CapitalController@show');
    Route::post('{id}/update', 'CapitalController@update');
    Route::get('{id}/delete', 'CapitalController@delete');
    //bank accounts
    Route::get('bank/data', 'BankAccountController@index');
    Route::get('bank/create', 'BankAccountController@create');
    Route::post('bank/store', 'BankAccountController@store');
    Route::get('bank/{bank}/edit', 'BankAccountController@edit');
    Route::get('bank/{id}/show', 'BankAccountController@show');
    Route::post('bank/{id}/update', 'BankAccountController@update');
    Route::get('bank/{id}/delete', 'BankAccountController@delete');
});
Route::get('audit_trail/data', 'AuditTrailController@index');
//routes branches
Route::group(['prefix' => 'branch'], function () {

    Route::get('data', 'BranchController@index');
    Route::get('create', 'BranchController@create');
    Route::post('store', 'BranchController@store');
    Route::get('{branch}/show', 'BranchController@show');
    Route::get('{branch}/edit', 'BranchController@edit');
    Route::post('{id}/update', 'BranchController@update');
    Route::get('{id}/delete', 'BranchController@delete');
    Route::get('{id}/delete_file', 'BranchController@deleteFile');
    Route::post('{id}/add_user', 'BranchController@addUser');
    Route::get('{id}/remove_user', 'BranchController@removeUser');
    Route::get('change', 'BranchController@change');
    Route::post('change', 'BranchController@updateChange');
});
