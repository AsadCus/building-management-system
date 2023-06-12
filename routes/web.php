<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ValueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ROUTE IN DEVELOPMENT

Route::get('/', function () {
    return redirect()->to("/login");
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Maintenance
    Route::group(['prefix' => 'maintenance', 'as' => 'maintenance.'], function () {
        Route::get('/', [MaintenanceController::class, 'index'])->name('get.view');
        Route::get('/create', [MaintenanceController::class, 'create'])->name('create');
        Route::post('/store', [MaintenanceController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [MaintenanceController::class, 'edit'])->name('edit');
        Route::put('/update', [MaintenanceController::class, 'update'])->name('put.update');
        Route::delete('/delete', [MaintenanceController::class, 'destroy'])->name('delete');
    });

    // Form
    Route::group(['prefix' => 'form', 'as' => 'form.'], function () {
        Route::get('/', [FormController::class, 'index'])->name('get.view');
        Route::get('/create', [FormController::class, 'create'])->name('create');
        Route::post('/store', [FormController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [FormController::class, 'edit'])->name('edit');
        Route::put('/update', [FormController::class, 'update'])->name('put.update');
        Route::delete('/delete', [FormController::class, 'destroy'])->name('delete');
    });

    // Value
    Route::group(['prefix' => 'value', 'as' => 'value.'], function () {
        Route::get('/', [ValueController::class, 'index'])->name('get.view');
        Route::get('/create', [ValueController::class, 'create'])->name('create');
        Route::post('/store', [ValueController::class, 'store'])->name('post.store');
    });

    // Building
    Route::group(['prefix' => 'building', 'as' => 'building.'], function () {
        Route::get('/', [BuildingController::class, 'index'])->name('get.view');
        Route::get('/create', [BuildingController::class, 'create'])->name('create');
        Route::post('/store', [BuildingController::class, 'store'])->name('post.store');
    });

    // Floor
    Route::group(['prefix' => 'floor', 'as' => 'floor.'], function () {
        Route::get('/', [FloorController::class, 'index'])->name('get.view');
        Route::get('/create', [FloorController::class, 'create'])->name('create');
        Route::post('/store', [FloorController::class, 'store'])->name('post.store');
    });

    // Room
    Route::group(['prefix' => 'room', 'as' => 'room.'], function () {
        Route::get('/', [RoomController::class, 'index'])->name('get.view');
        Route::get('/create', [RoomController::class, 'create'])->name('create');
        Route::post('/store', [RoomController::class, 'store'])->name('post.store');
    });
});



