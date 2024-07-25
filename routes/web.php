<?php


use App\Models\service;
use App\Http\Middleware\CheckRole;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\DashboardCustomer\Home\Index;

use App\Http\Controllers\DashboardAdmin\BankController;
use App\Http\Controllers\DashboardAdmin\FirmController;


use App\Http\Controllers\DashboardAdmin\RoleController;
use App\Http\Controllers\DashboardAdmin\UsersController;

use App\Http\Controllers\DashboardAdmin\ModuleController;
use App\Http\Controllers\DashboardAdmin\ServiceController;
use App\Http\Controllers\DashboardAdmin\CustomerController;
use App\Http\Controllers\DashboardAdmin\SaleUserController;
use App\Http\Controllers\DashboardAdmin\HomeAdminController;

use App\Http\Controllers\DashboardAdmin\ExhibitorsController;
use App\Http\Controllers\DashboardAdmin\CertificateController;
use App\Http\Controllers\DashboardAdmin\PermissionsController;

use App\Http\Controllers\DashboardAdmin\TypeServiceController;
use App\Http\Controllers\presentation\HomePresentationController;
use App\Http\Controllers\DashboardAdmin\TypeCertificateController;
use App\Http\Controllers\DashboardCustomer\HomeCustomerController;
use App\Http\Controllers\DashboardAdmin\SaleUserValidateController;

use App\Http\Controllers\DashboardAdmin\SettingsController;
use App\Http\Controllers\DashboardCustomer\Services\serviceCustomerController;
use App\Http\Controllers\DashboardCustomer\Services\MyServiceCustomerController;
use App\Http\Controllers\DashboardCustomer\Services\serviceController as ServicesServiceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/register', [RegisterFormController::class, 'index'])->name('users.register.index');

Route::get('/', function () {
    return view('auth.login');
});


// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
//     'admin',
// ])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// });
// Route::get('/user_area', [HomeController::class, 'index'])->name('user_area.index')->name('dashboard.index');

// Route::get('/dashboard-admin', [DashboardAdminController::class, 'index'])->name('dashboard-admin.index');
// Route::get('/dashboard-user', [DashboardUserController::class, 'index'])->name('user_area.index')->name('dashboard-user.index');


Route::get('certificate/{id}/generate', [CertificateController::class, 'GenerarCertificado'])->name('generate.certificate');
Route::middleware([
    'auth:sanctum',
    //'can:admin_admins',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    route::get('/home', [HomeController::class, 'index'])->name('home.index');
});


Route::middleware([
    'auth:sanctum',
    'can:admin_admins',
    config('jetstream.auth_session'),
    'verified',

])->group(function () {
    route::get('/home_admin', [HomeAdminController::class, 'index'])->name('home.admin.index');

    Route::group(['middleware' => ['can:users']], function () {
        route::get('/users', [UsersController::class, 'index'])->name('user.index');
    });
    Route::group(['middleware' => ['can:customers']], function () {
        route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/customers/{code}', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::get('/customers/{code}/service/{certificate}', [CustomerController::class, 'service_edit'])->name('customer.service.edit');
        Route::get('/customers/{code}/sale/{sale}', [CustomerController::class, 'sale_edit'])->name('customer.sale.edit');
    });
    Route::group(['middleware' => ['can:type_services']], function () {
        Route::get('/type_service', [TypeServiceController::class, 'index'])->name('type_service.index');
        Route::get('/type_service/{id}', [TypeServiceController::class, 'edit'])->name('type_service.edit');
    });
    Route::group(['middleware' => ['can:services']], function () {
        Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/service/{slug}', [ServiceController::class, 'edit'])->name('service.edit');
    });
    Route::group(['middleware' => ['can:exhibitors']], function () {
        Route::get('/exhibitors', [ExhibitorsController::class, 'index'])->name('exhibitor.index');
        Route::get('/exhibitors/{id}', [ExhibitorsController::class, 'edit'])->name('exhibitor.edit');
    });
    Route::group(['middleware' => ['can:firms']], function () {
        Route::get('/firms', [FirmController::class, 'index'])->name('firm.index');
        Route::get('/firms/{id}', [FirmController::class, 'edit'])->name('firm.edit');
    });

    Route::group(['middleware' => ['can:banks']], function () {
        Route::get('/banks', [BankController::class, 'index'])->name('bank.index');
    });
    Route::group(['middleware' => ['can:type_certificates']], function () {
        Route::get('/type_certificate', [TypeCertificateController::class, 'index'])->name('type_certicate.index');
    });
    Route::group(['middleware' => ['can:certificates']], function () {
        Route::get('/certificate', [CertificateController::class, 'index'])->name('certificate.index');
        Route::get('/certificate/create', [CertificateController::class, 'create'])->name('certificate.create');
        Route::get('/certificate/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
        Route::get('/certificate/{id}/modules', [ModuleController::class, 'index'])->name('certificate.module.index');

        Route::get('/certificate/{id}/certificate-edit', [ModuleController::class, 'certificate_edit'])->name('certificate.certificate-edit.index');
        Route::get('/certificate/{id}/modules/{module}', [ModuleController::class, 'edit'])->name('certificate.module.edit');
    });
    Route::group(['middleware' => ['can:sale_users']], function () {
        Route::get('/sale_user', [SaleUserController::class, 'index'])->name('sale_user.index');
    });
    Route::group(['middleware' => ['can:sale_finances']], function () {
        Route::get('/finances', [SaleUserController::class, 'finances'])->name('finances.index');
    });
    Route::group(['middleware' => ['can:validate_users']], function () {
        Route::get('/sale_user/validate', [SaleUserController::class, 'validatesale'])->name('sale_user.validate.index');
    });
    Route::group(['middleware' => ['can:validate_finances']], function () {
        Route::get('/sale_user/validate_finance', [SaleUserController::class, 'Validatefinance'])->name('sale_user.validate.finance.index');
        Route::get('/sale_user/validate_finance/{sale}', [SaleUserController::class, 'Validatefinanceedit'])->name('sale_user.validate.finance.edit');
        //Route::get('/sale_user/validate/{code}', [SaleUserController::class, 'validatesaleedit'])->name('sale_user.validate.sale.index');
        // Route::get('/sale_user/validate/{code}/sale/{sale}', [SaleUserController::class, 'validatesaleedit2'])->name('sale_user.validate.sale2.index');
    });
    Route::group(['middleware' => ['can:roles']], function () {
        Route::get('/roles', [RoleController::class, 'index'])->name('role.index');
        Route::get('/roles/{id}', [RoleController::class, 'edit'])->name('role.edit');
    });
    Route::group(['middleware' => ['can:permissions']], function () {
        Route::get('/permissions', [PermissionsController::class, 'index'])->name('permissions.index');
    });
    // Route::group(['middleware' => ['can:services_services']], function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    // });


});


Route::middleware([
    'auth:sanctum',
    'can:admin_customers',
    config('jetstream.auth_session'),
    'verified',
])->group(
    function () {

        route::get('/home_customer', [HomeCustomerController::class, 'index'])->name('home.customer.index');
        // route::get('/home', [HomeController::class, 'index'])->name('home.index');
        route::get('/services', [serviceCustomerController::class, 'index'])->name('service.customer.index');
        // route::get('/services/{slug}', [serviceCustomerController::class, 'view'])->name('service.customer.view');
        route::get('/services/{slug}', [serviceCustomerController::class, 'view'])->name('service.customer.view');
        route::get('/my_services', [MyServiceCustomerController::class, 'index'])->name('my.service.customer.index');
        route::get('/my_services/{slug}', [MyServiceCustomerController::class, 'view'])->name('my.service.customer.view');
        route::get('/my_services/{slug}/video/{module}', [MyServiceCustomerController::class, 'video'])->name('my.service.customer.video');
    }
);

//rutas de presentacion
Route::middleware([])->group(function () {
    route::get('/p-home', [HomePresentationController::class, 'index'])->name('p-home.index');
    route::get('/p-cursos', [HomePresentationController::class, 'cursos'])->name('p-cursos.index');
});
 
