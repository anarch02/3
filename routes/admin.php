<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AdminController as AuthAdminController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthAdminController::class, 'index'])->name('admin.login');
Route::post('/login_proccess', [AuthAdminController::class, 'login'])->name('admin.login_proccess');

Route::middleware('auth:admin')->group(function()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('group', GroupController::class);
    Route::resource('branch', BranchController::class);
    Route::resource('admin', AdminController::class);
    Route::resource('user', UserController::class);
});