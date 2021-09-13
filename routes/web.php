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


Route::post('/aiz-uploader', [\App\Http\Controllers\AizUploadController::class, 'show_uploader']);
Route::post('/aiz-uploader/upload', [\App\Http\Controllers\AizUploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [\App\Http\Controllers\AizUploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [\App\Http\Controllers\AizUploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [\App\Http\Controllers\AizUploadController::class, 'attachment_download'])->name('download_attachment');



Route::middleware(['auth'])->group(function () {
    Route::get('/',[App\Http\Controllers\IndexController::class,'index'])->name('index');

    Route::get('seller', [\App\Http\Controllers\seller\SellerController::class, 'index'])->name('seller');
    Route::get('seller_request', [\App\Http\Controllers\seller\SellerController::class, 'sellerRequest'])->name('seller_request');


    Route::get('category', [\App\Http\Controllers\CategoryController::class, 'index'])->name('category');
    Route::get('add_category', [\App\Http\Controllers\CategoryController::class, 'addCategory'])->name('add_category');
    Route::post('submit_category', [\App\Http\Controllers\CategoryController::class, 'submitCategory'])->name('submit_category');


});
Route::get('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'resetPassword'])->name('resetPassword');

Route::get('/register',[App\Http\Controllers\Auth\LoginController::class,'register_page'])->name('register_page');
Route::post('/register',[App\Http\Controllers\Auth\LoginController::class,'register'])->name('register');

Route::get('/nav',[App\Http\Controllers\Auth\LoginController::class,'test'])->name('test');
