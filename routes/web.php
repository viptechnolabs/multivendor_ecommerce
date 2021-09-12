<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/Route::get('/reset', function () {
    return view('Auth.reset');
});


Route::get('login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
Route::post('do_login',[App\Http\Controllers\Auth\LoginController::class,'doLogin'])->name('do_login');
Route::get('logout',[App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/',[App\Http\Controllers\IndexController::class,'index'])->name('index');

    Route::get('seller', [\App\Http\Controllers\seller\SellerController::class, 'index'])->name('seller');


});
Route::get('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'resetPassword'])->name('resetPassword');

Route::get('/register',[App\Http\Controllers\Auth\LoginController::class,'register_page'])->name('register_page');
Route::post('/register',[App\Http\Controllers\Auth\LoginController::class,'register'])->name('register');

Route::get('/nav',[App\Http\Controllers\Auth\LoginController::class,'test'])->name('test');
