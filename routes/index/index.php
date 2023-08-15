<?php

use App\Http\Controllers\Customer\Account\AccountController;
use App\Http\Controllers\Index\LocationController;
use App\Http\Controllers\Index\SearchController;
use App\Http\Controllers\Index\CategoryController;
use App\Http\Controllers\Index\ShopController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TestController;
Route::get('/', function () {
    return view('Index.Home.Index');
})->name('index.Home.index');

Route::get('/test', [TestController::class, 'Test']);

Route::get('/dang-nhap', [AccountController::class, 'Login'])->name('index.login.index');
Route::post('/dang-nhap', [AccountController::class, 'LoginPost'])->name('index.login.index-post');
Route::get('/dang-ky', [AccountController::class, 'Signup'])->name('index.signup.index');
Route::post('/dang-ky', [AccountController::class, 'SignupPost'])->name('index.signup.index-post');

Route::get('/chon-thanh-pho/{id_city}', [LocationController::class, 'SetSessionCity']);
Route::get('/chon-cho/{id_market}', [LocationController::class, 'SetSessionMarket']);

Route::get('/tim-kiem', [SearchController::class, 'Search']);
Route::get('/danh-muc/{id}', [CategoryController::class, 'ProductsCategory']);

Route::get('/cua-hang/{id}', [ShopController::class, 'Index']);
Route::get('/tat-ca-cua-hang', [ShopController::class, 'AllShop']);
Route::get('/chi-tiet-san-pham/{id}/{slug}', [ShopController::class, 'ProductDetail']);

Route::get('/xem-them', [CategoryController::class, 'ProductsLoadMoreRelate']);


Route::get('/dat-lai-vi-tri', [LocationController::class, 'ResetLocation']);





