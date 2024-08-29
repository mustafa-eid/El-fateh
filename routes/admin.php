<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\signController;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// //routes of admin
// Route::get('/loginforadmin',[signController::class,'indexadmin'])->name('loginadmin');
// Route::post('/loginadmin',[signController::class,'loginadmin'])->name('loginadmin');
// //routes
// // Home
// Route::get('/admin-dashboard', [HomeController::class , 'index'])->name('admin.index');
// // Why Us

Route::get('login-admin', [AdminController::class, 'login'])->name('login');

Route::post('check', [AdminController::class, 'adminSignin'])->name('checkAdmin');

Route::get('signup-admin', [AdminController::class, 'signupView'])->name('signupView');

Route::post('signup-admin', [AdminController::class, 'adminSignup'])->name('adminSignup');

Route::middleware('auth:admin')->group(function () {

    Route::get('dashboard', [AdminController::class, 'siginedin'])->name('dashboard');

    Route::post('/logout/admin', [AdminController::class, 'logout'])->name('logout.admin');
});
