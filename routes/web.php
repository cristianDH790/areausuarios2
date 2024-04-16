<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\dashboardAdmin\DashboardAdminController;
use App\Http\Controllers\dashboardUser\DashboardUserController;
use App\Http\Controllers\HomeController as ControllersHomeController;
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
});
