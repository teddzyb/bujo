<?php

use App\Http\Controllers\DailyLogController;
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

Route::get('/dailylogs', [DailyLogController::class, 'index']);
Route::prefix('/dailylogs')->group( function() {
    Route::post('/add', [DailyLogController::class, 'add']);
    // Route::put('/{id}', [DailyLogController::class, 'edit']);
    // Route::delete('/{id}', [DailyLogController::class, 'delete']);
});
