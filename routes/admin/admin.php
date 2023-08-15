<?php

use App\Http\Controllers\Admin\Account\AccountController;
use App\Http\Controllers\Admin\Dashboard\ChangePasswordController;
use App\Http\Controllers\Admin\UserManage\UserManageController;
use App\Http\Controllers\Admin\ShiperManage\ShiperManageController;
use App\Http\Controllers\Admin\ShopManage\ShopManageController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Location\LocationController;
use App\Http\Controllers\Admin\Config\ConfigController;
use App\Http\Controllers\Admin\Payment\PaymentController;
use App\Http\Controllers\Admin\EmailCampaign\EmailCampaignController;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'checkadmin'], function () {
        Route::get('/doi-mat-khau', [ChangePasswordController::class, 'index']);
        Route::post('/doi-mat-khau', [ChangePasswordController::class, 'ChangePasswordPost']);

        Route::get('/thuoc-tinh', [ConfigController::class, 'Config']);
        Route::post('/thuoc-tinh', [ConfigController::class, 'PostConfig']);

        Route::get('/dang-xuat', [AccountController::class, 'Logout']);

        Route::prefix('quan-ly-thanh-toan')->group(function () {
            Route::get('/', [PaymentController::class, 'Payment']);
            Route::get('da-chuyen-tien/{id}', [PaymentController::class, 'FinishPayment']);
        });

        Route::prefix('quan-ly-nguoi-dung')->group(function () {
            Route::get('/', [UserManageController::class, 'ListUser']);
            Route::get('khoa-mo-nguoi-dung/{id}', [UserManageController::class, 'BlockUnBlockUser']);
            Route::get('tim-kiem', [UserManageController::class, 'SearchUser']);
        });
        Route::prefix('quan-ly-shiper')->group(function () {
            Route::get('/', [ShiperManageController::class, 'ListShiper']);
            Route::get('khoa-mo-shiper/{id}', [ShiperManageController::class, 'BlockUnBlockAccountShiper']);
            Route::get('tim-kiem', [ShiperManageController::class, 'SearchShiper']);
        });
        Route::prefix('quan-ly-cua-hang')->group(function () {
            Route::get('/', [ShopManageController::class, 'ListAccountShop']);
            Route::get('xem-tat-ca-cua-hang/{id}', [ShopManageController::class, 'ListAllShop']);
            Route::get('khoa-mo-tai-khoan-cua-hang/{id}', [ShopManageController::class, 'BlockUnBlockAccountShop']);
            Route::get('tim-kiem', [ShopManageController::class, 'SearchAccountShop']);

            Route::get('khoa-mo-cua-hang/{id}', [ShopManageController::class, 'BlockUnBlockShop']);
            Route::get('quan-ly-san-pham/xem-san-pham/{id}', [ShopManageController::class, 'ListProducts']);
            Route::get('quan-ly-san-pham/khoa-mo-san-pham/{id}', [ShopManageController::class, 'BlockUnBlockProduct']);
        });
        Route::prefix('quan-ly-danh-muc')->group(function () {
            Route::get('/', [CategoryController::class, 'CategoryManage']);
            Route::get('them-danh-muc', [CategoryController::class, 'AddCategory']);
            Route::post('them-danh-muc', [CategoryController::class, 'AddCategorySubmit']);
            Route::get('sua-danh-muc/{id}', [CategoryController::class, 'EditCategory']);
            Route::post('sua-danh-muc/{id}', [CategoryController::class, 'EditCategorySubmit']);
            Route::get('xoa-danh-muc/{id}', [CategoryController::class, 'DeleteCategory']);
        });
        Route::prefix('quan-ly-dia-diem')->group(function () {
            Route::get('/', [LocationController::class, 'CityManage']);
            Route::get('them-thanh-pho', [LocationController::class, 'AddCity']);
            Route::post('them-thanh-pho', [LocationController::class, 'AddCitySubmit']);
            Route::get('sua-thanh-pho/{id}', [LocationController::class, 'EditCity']);
            Route::post('sua-thanh-pho/{id}', [LocationController::class, 'EditCitySubmit']);
            Route::get('xoa-thanh-pho/{id}', [LocationController::class, 'DeleteCity']);
            Route::get('xoa-cho/{id}', [LocationController::class, 'DeleteMarket']);

            Route::get('xem-cho/{id}', [LocationController::class, 'MarketManage']);
            Route::get('them-cho/{id}', [LocationController::class, 'AddMarket']);
            Route::post('them-cho/{id}', [LocationController::class, 'AddMarketSubmit']);
            Route::get('sua-cho/{id}', [LocationController::class, 'EditMarket']);
            Route::post('sua-cho/{id}', [LocationController::class, 'EditMarketSubmit']);

            Route::get('xem-cua-hang/{id}', [LocationController::class, 'ListShop']);

            Route::get('tam-khoa-cua-hang/{id}', [LocationController::class, 'BlockShop']);
            Route::get('tim-kiem', [LocationController::class, 'SearchCity']);
        });
        Route::prefix('chien-dich-email')->group(function () {
            Route::prefix('mau-email')->group(function () {
                Route::get('/', [EmailCampaignController::class, 'ListEmailTemplate']);
                Route::get('them', [EmailCampaignController::class, 'AddEmailTemplate']);
                Route::post('them', [EmailCampaignController::class, 'PostAddEmailTemplate']);
                Route::get('xoa/{id}', [EmailCampaignController::class, 'DeleteEmailTemplate']);
                Route::get('sua/{id}', [EmailCampaignController::class, 'EditEmailTemplate']);
                Route::post('sua/{id}', [EmailCampaignController::class, 'PostEditEmailTemplate']);
            });   
            Route::prefix('cau-hinh-email')->group(function () {
                Route::get('/', [EmailCampaignController::class, 'ListEmailConfig']);
                Route::get('xoa/{id}', [EmailCampaignController::class, 'DeleteEmailConfig']);
                Route::get('them', [EmailCampaignController::class, 'AddEmailConfig']);
                Route::post('them', [EmailCampaignController::class, 'PostAddEmailConfig']);
                Route::post('/kiem-tra', [EmailCampaignController::class, 'TestEmailConfig']);
                Route::get('sua/{id}', [EmailCampaignController::class, 'EditEmailConfig']);
                Route::post('sua/{id}', [EmailCampaignController::class, 'PostEditEmailConfig']);
                Route::get('dat-lam-email-chinh/{id}', [EmailCampaignController::class, 'SetDefaultEmailConfig']);
            }); 
            Route::prefix('gui-email')->group(function () {
                Route::get('/', [EmailCampaignController::class, 'ListEmailCampaign']);
                Route::get('chi-tiet/{id}', [EmailCampaignController::class, 'ListEmailCampaignDetail']);
                Route::get('xoa/{id}', [EmailCampaignController::class, 'DeleteEmailCampaign']);
                Route::get('them', [EmailCampaignController::class, 'AddEmailCampaign']);
                Route::post('them-danh-sach', [EmailCampaignController::class, 'PostAddEmailCampaignListUser']);
                Route::post('them-loc', [EmailCampaignController::class, 'PostAddEmailCampaignTypeUser']);
                Route::get('loc-tai-khoan/{type}', [EmailCampaignController::class, 'GetListUserByType']);
            });   
            Route::prefix('thiet-lap')->group(function () {
               Route::get('/', [EmailCampaignController::class, 'Config']);
               Route::post('/', [EmailCampaignController::class, 'PostConfig']);
           });
        });  
        Route::prefix('nhan-dien-guong-mat')->group(function () {
            Route::get('/', [ShiperManageController::class, 'ListFaceUser']);
            Route::get('nhan-dien-lai/{id}', [ShiperManageController::class, 'ResetFace']);
            Route::get('xem-du-lieu/{id}', [ShiperManageController::class, 'DataFace']);
        });
    });
Route::get('/dang-nhap', [AccountController::class, 'Login']);
Route::post('/dang-nhap', [AccountController::class, 'LoginPost']);
});


