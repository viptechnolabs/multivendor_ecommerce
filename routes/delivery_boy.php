<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DeliveryBoy Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login',[\App\Http\Controllers\API\DeliveryBoyController::class,'login']);
Route::post('/signup',[\App\Http\Controllers\API\DeliveryBoyController::class,'signup']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/test',[\App\Http\Controllers\API\DeliveryBoyController::class,'test']);
    Route::post('/logout',[\App\Http\Controllers\API\DeliveryBoyController::class,'logout']);
});
