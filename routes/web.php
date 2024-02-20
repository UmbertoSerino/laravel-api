<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\Admin\UserController as AdminUserController;



use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware('auth')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Route Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        // Route Soft Delete - Delete
        Route::get('/project/softdelete', [AdminProjectController::class, 'indexDelete'])->name('softdelete.index');
        Route::get('/project/softdelete/{project}', [AdminProjectController::class, 'showDelete'])->name('softdelete.show');
        Route::patch('/project/softdelete/{project}', [AdminProjectController::class, 'restoreDelete'])->name('softdelete.restore');
        Route::delete('/project/softdelete/{project}', [AdminProjectController::class, 'destroyDelete'])->name('softdelete.destroy');
        // Route Resource Project
        Route::resource('/projects', AdminProjectController::class);
        // Route Resource User
        Route::resource('/users', AdminUserController::class);
        // Route Resource Type
        Route::resource('/types', AdminTypeController::class);
        // Route Resource Technology
        Route::resource('/technologies', AdminTechnologyController::class);
    });