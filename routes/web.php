<?php

use App\Http\Controllers\DashboardAdmin\CertificateController;
use App\Http\Controllers\DashboardAdmin\CustomerController;
use App\Http\Controllers\DashboardAdmin\ExhibitorsController;
use App\Http\Controllers\DashboardAdmin\FirmController;
use App\Http\Controllers\DashboardAdmin\ModuleController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\DashboardAdmin\ServiceController;
use App\Http\Controllers\DashboardAdmin\TypeCertificateController;
use App\Http\Controllers\DashboardAdmin\TypeServiceController;
use App\Http\Controllers\DashboardAdmin\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    route::get('/home', [HomeController::class, 'index'])->name('home.index');
    route::get('/users', [UsersController::class, 'index'])->name('user.index');
    route::get('/customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customers/{code}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/type_service', [TypeServiceController::class, 'index'])->name('type_service.index');
    Route::get('/type_service/{id}', [TypeServiceController::class, 'edit'])->name('type_service.edit');
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/{slug}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::get('/exhibitors', [ExhibitorsController::class, 'index'])->name('exhibitor.index');
    Route::get('/exhibitors/{id}', [ExhibitorsController::class, 'edit'])->name('exhibitor.edit');
    Route::get('/firms', [FirmController::class, 'index'])->name('firm.index');
    Route::get('/firms/{id}', [FirmController::class, 'edit'])->name('firm.edit');
    Route::get('/type_certificate', [TypeCertificateController::class, 'index'])->name('type_certicate.index');
    Route::get('/certificate', [CertificateController::class, 'index'])->name('certificate.index');
    Route::get('/certificate/create', [CertificateController::class, 'create'])->name('certificate.create');
    Route::get('/certificate/{id}', [CertificateController::class, 'edit'])->name('certificate.edit');
    Route::get('/certificate/{id}/modules', [ModuleController::class, 'edit'])->name('certificate.module.edit');
});
