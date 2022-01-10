<?php

use App\Http\Controllers\DailyLogController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\HydrationLogController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Daily Log
Route::get('/dailylogs', [DailyLogController::class, 'index']);
Route::prefix('/dailylog')->group( function() {
    Route::post('/store', [DailyLogController::class, 'store']);
    Route::put('/{id}', [DailyLogController::class, 'update']);
    Route::delete('/{id}', [DailyLogController::class, 'destroy']);
});

// Activity Tracker
Route::get('/activitylogs', [ActivityLogController::class, 'index']);
Route::prefix('/activitylog')->group( function() {
    Route::post('/store', [ActivityLogController::class, 'store']);
    Route::put('/{id}', [ActivityLogController::class, 'update']);
    Route::delete('/{id}', [ActivityLogController::class, 'destroy']);
});

// Hydration Tracker
Route::get('/hydrationlogs', [HydrationLogController::class, 'index']);
Route::prefix('/hydrationlog')->group( function() {
    Route::post('/store', [HydrationLogController::class, 'store']);
    Route::put('/{id}', [HydrationLogController::class, 'update']);
    Route::delete('/{id}', [HydrationLogController::class, 'destroy']);
});
