<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CounterController;
use App\Http\Controllers\admin\DepartmentController;
use App\Http\Controllers\admin\DisplayController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\TokenController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin/dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('department', DepartmentController::class);
    Route::resource('employee', EmployeeController::class);
    Route::get('token/new/{department}', [TokenController::class, 'generate'])->name('token.generate');
    Route::resource('token', TokenController::class);
    Route::resource('counter', CounterController::class);
    Route::resource('display', DisplayController::class);
    Route::get('restToken', [TokenController::class, 'restToken'])->name('restToken');

});


Route::redirect('/admin/dashboard', '/admin/dashboard/index');
