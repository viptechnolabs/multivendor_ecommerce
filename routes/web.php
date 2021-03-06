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
*/
Route::view('/reset','Auth.reset');
Route::middleware(['no-auth'])->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
    Route::post('do_login', [App\Http\Controllers\Auth\LoginController::class, 'doLogin'])->name('do_login');
});
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


Route::post('/aiz-uploader', [\App\Http\Controllers\AizUploadController::class, 'show_uploader']);
Route::post('/aiz-uploader/upload', [\App\Http\Controllers\AizUploadController::class, 'upload']);
Route::get('/aiz-uploader/get_uploaded_files', [\App\Http\Controllers\AizUploadController::class, 'get_uploaded_files']);
Route::post('/aiz-uploader/get_file_by_ids', [\App\Http\Controllers\AizUploadController::class, 'get_preview_files']);
Route::get('/aiz-uploader/download/{id}', [\App\Http\Controllers\AizUploadController::class, 'attachment_download'])->name('download_attachment');



Route::middleware(['auth', 'checkUserStatus'])->group(function () {
    Route::get('/',[App\Http\Controllers\IndexController::class,'index'])->name('index');

    Route::get('seller', [\App\Http\Controllers\seller\SellerController::class, 'index'])->name('seller');
    Route::get('seller_request', [\App\Http\Controllers\seller\SellerController::class, 'sellerRequest'])->name('seller_request');
    Route::post('seller_request_approved', [\App\Http\Controllers\seller\SellerController::class, 'sellerApproved'])->name('seller_request_approved');
    Route::get('seller_request_delete/{id}', [\App\Http\Controllers\seller\SellerController::class, 'sellerRequestDelete'])->name('seller_request_delete');
    Route::post('seller_update_status', [\App\Http\Controllers\seller\SellerController::class, 'updateSellerStatus'])->name('seller_update_status');
    Route::get('seller_profile/{id}', [\App\Http\Controllers\seller\SellerController::class, 'sellerProfile'])->name('seller_profile');


    Route::get('category', [\App\Http\Controllers\category\CategoryController::class, 'index'])->name('category');
    Route::get('add_category', [\App\Http\Controllers\category\CategoryController::class, 'addCategory'])->name('add_category');
    Route::post('submit_category', [\App\Http\Controllers\category\CategoryController::class, 'submitCategory'])->name('submit_category');
    Route::post('category_featured', [\App\Http\Controllers\category\CategoryController::class, 'updateFeatured'])->name('category_featured');
    Route::get('category_destroy/{id}', [\App\Http\Controllers\category\CategoryController::class, 'destroy'])->name('category_destroy');
    Route::get('category_edit/{id}', [\App\Http\Controllers\category\CategoryController::class, 'edit'])->name('category_edit');
    Route::post('update_category/{id}', [\App\Http\Controllers\category\CategoryController::class, 'update'])->name('update_category');


    Route::get('customer', [\App\Http\Controllers\customer\CustomerController::class, 'index'])->name('customer');



    Route::get('activity_log', [\App\Http\Controllers\IndexController::class, 'activityLog'])->name('activity_log');
    Route::get('activity_delete', [\App\Http\Controllers\IndexController::class, 'activityDelete'])->name('activity_delete');

    Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});
Route::get('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'forgetPassword'])->name('forgetPassword');
Route::post('/forget-password',[App\Http\Controllers\Auth\LoginController::class,'resetPassword'])->name('resetPassword');

Route::get('/register',[App\Http\Controllers\Auth\LoginController::class,'register_page'])->name('register_page');
Route::post('/register',[App\Http\Controllers\Auth\LoginController::class,'register'])->name('register');

//Route::get('/nav',[App\Http\Controllers\Auth\LoginController::class,'test'])->name('test');
