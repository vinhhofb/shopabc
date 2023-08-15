<?php

use App\Http\Controllers\Shiper\Account\AccountController;
use App\Http\Controllers\Shiper\Dashboard\InfomationController;
use App\Http\Controllers\Shiper\Dashboard\ChangePasswordController;
use App\Http\Controllers\Shiper\Order\OrderController;
use App\Http\Controllers\Shiper\Face\FaceController;

use Illuminate\Support\Facades\Route;



Route::prefix('kenh-giao-hang')->group(function () {
    Route::group(['middleware' => 'checkshipper'], function () {
        Route::get('/thong-tin-tai-khoan', [InfomationController::class, 'index']);
        Route::post('/thong-tin-tai-khoan', [InfomationController::class, 'EditInfo']);
        Route::get('/doi-mat-khau', [ChangePasswordController::class, 'index']);
        Route::post('/doi-mat-khau', [ChangePasswordController::class, 'ChangePasswordPost']);

        Route::get('/du-lieu-nhan-dien', [FaceController::class, 'DataFace']);
        Route::get('/dang-xuat', [AccountController::class, 'Logout']);

        Route::get('/nhan-don-hang', [OrderController::class, 'GetOrder']);
        Route::get('/nhan-don/{id}', [OrderController::class, 'Ship']);
        Route::get('/quan-ly-don-hang', [OrderController::class, 'ShipManage']);
        Route::get('/hoan-tat-don-hang/{id}', [OrderController::class, 'ShipFinish']);

        Route::get('/lich-su-giao-dich', [OrderController::class, 'Transaction']);
        Route::get('/rut-tien', [OrderController::class, 'Withdraw']);
        Route::post('/rut-tien', [OrderController::class, 'PostWithdraw']);


        Route::get('/dang-ky-guong-mat', [FaceController::class, 'RegisterFace']);
        Route::post('/dang-ky-guong-mat', [FaceController::class, 'PostRegisterFace']);

        Route::get('/nhan-dien-guong-mat', [FaceController::class, 'CheckFace']);
        Route::get('/xac-nhan-thanh-cong', [FaceController::class, 'ConfirmFace']);
    });

    Route::get('/dang-nhap', [AccountController::class, 'Login']);
    Route::get('/dang-ky', [AccountController::class, 'Signup']);
    Route::post('/dang-nhap', [AccountController::class, 'LoginPost']);
    Route::post('/dang-ky', [AccountController::class, 'SignupPost']);

    

    
});


