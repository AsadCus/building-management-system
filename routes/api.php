<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ValueController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API ROUTE IN DEVELOPMENT

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Testing
// GET
Route::get('/bms/maintenances', [MaintenanceController::class, 'getAllMaintenanceApi']);
Route::get('/bms/buildings', [BuildingController::class, 'getAllBuildingApi']);
Route::get('/bms/floors', [FloorController::class, 'getAllFloorApi']);
Route::get('/bms/forms', [MaintenanceController::class, 'getAllFormApi']);
Route::get('/bms/values', [ValueController::class, 'getAllValueApi']);

// POST
Route::post('/bms/maintenance/store', [MaintenanceController::class, 'postStoreMaintenanceApi']);
Route::post('/bms/building/store', [BuildingController::class, 'postStoreBuildingApi']);
Route::post('/bms/floor/store', [BuildingController::class, 'postStoreBuildingFloorApi']);
Route::post('/bms/room/store', [BuildingController::class, 'postStoreBuildingRoomApi']);
Route::post('/bms/form/store', [MaintenanceController::class, 'postStoreFormApi']);
Route::post('/bms/value/store', [ValueController::class, 'postStoreValueApi']);
Route::post('/bms/value/file/store', [ValueController::class, 'postStoreFileApi']);
// End Testing

// Admin
// Maintenance
Route::group(['prefix' => 'maintenance'], function () {
    Route::get('/', [MaintenanceController::class, 'getAllMaintenanceIndexApi']);
    Route::get('/select', [MaintenanceController::class, 'getAllMaintenanceForSelect']);
});

// Form
Route::group(['prefix' => 'form'], function () {
    Route::get('/', [FormController::class, 'getAllFormApi']);
    Route::get('/select', [FormController::class, 'getAllFormForSelect']);
});

// Value
Route::group(['prefix' => 'value'], function () {
    Route::get('/', [ValueController::class, 'getAllValueIndexApi']);
    Route::get('/select', [ValueController::class, 'getAllValueForSelect']);
});

// Building
Route::group(['prefix' => 'building'], function () {
    Route::get('/', [BuildingController::class, 'getAllBuildingApi']);
    Route::get('/select', [BuildingController::class, 'getAllBuildingForSelect']);
});

// Floor
Route::group(['prefix' => 'floor'], function () {
    Route::get('/', [FloorController::class, 'getAllFloorApi']);
    Route::get('/select', [FloorController::class, 'getAllFloorForSelect']);
});

// Building
Route::group(['prefix' => 'room'], function () {
    Route::get('/', [RoomController::class, 'getAllRoomApi']);
    Route::get('/select', [RoomController::class, 'getAllRoomForSelect']);
});