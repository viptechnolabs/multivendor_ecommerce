<?php

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

Route::post('/login',[\App\Http\Controllers\API\CustomerController::class,'login']);
Route::post('/signup',[\App\Http\Controllers\API\CustomerController::class,'signup']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout',[\App\Http\Controllers\API\CustomerController::class,'logout']);
});
