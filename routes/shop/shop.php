<?php

use App\Http\Controllers\Shop\Account\AccountController;
use App\Http\Controllers\Shop\Dashboard\InfomationController;
use App\Http\Controllers\Shop\Dashboard\ChangePasswordController;
use App\Http\Controllers\Shop\Dashboard\ShopController;

use Illuminate\Support\Facades\Route;

Route::get('lay-cho/{cityid}',[ShopController::class,'GetCity']);

Route::prefix('kenh-cua-hang')->group(function () {
    Route::prefix('quan-ly-cua-hang')->group(function () {
        Route::get('/', [ShopController::class, 'index']);
        Route::get('them-cua-hang', [ShopController::class, 'AddShop']);
        Route::post('them-cua-hang', [ShopController::class, 'AddShopSubmit']);
        Route::get('sua-cua-hang/{id}', [ShopController::class, 'EditShop']);
        Route::post('sua-cua-hang/{id}', [ShopController::class, 'EditShopSubmit']);

        Route::get('san-pham/{id}', [ShopController::class, 'ListProducts']);
        Route::get('khoa-mo-cua-hang/{id}', [ShopController::class, 'BlockUnBlockShop']);
        Route::get('khoa-mo-san-pham/{id}', [ShopController::class, 'BlockUnBlockProduct']);
        Route::get('them-san-pham/{id}', [ShopController::class, 'AddProduct']);
        Route::post('them-san-pham/{id}', [ShopController::class, 'AddProductSubmit']);
    });

    Route::get('/thong-tin-tai-khoan', [InfomationController::class, 'index']);
    Route::post('/thong-tin-tai-khoan', [InfomationController::class, 'EditInfo']);
    Route::get('/dang-nhap', [AccountController::class, 'Login']);
    Route::get('/dang-ky', [AccountController::class, 'Signup']);
    Route::post('/dang-nhap', [AccountController::class, 'LoginPost']);
    Route::post('/dang-ky', [AccountController::class, 'SignupPost']);

    Route::get('/doi-mat-khau', [ChangePasswordController::class, 'index']);
    Route::post('/doi-mat-khau', [ChangePasswordController::class, 'ChangePasswordPost']);

    Route::get('/dang-xuat', [AccountController::class, 'Logout']);
});

// Route::group(['middleware' => 'checkuser'], function () {
//     Route::get('/gio-hang', [CartController::class, 'Cart'])->name('index.cart.index');
//     Route::get('/thong-tin-ca-nhan', [InfomationController::class, 'Index'])->name('customer.infomation.index');
//     Route::get('/doi-mat-khau', [ChangePasswordController::class, 'Index'])->name('customer.change-password.index');
//     Route::post('/doi-mat-khau', [ChangePasswordController::class, 'ChangePasswordPost'])->name('customer.change-password.change-password-post');

//     Route::get('/don-hang', [OrderController::class, 'Index']);

//     Route::get('/dang-xuat', [AccountController::class, 'Logout'])->name('customer.logout.logout');


//     Route::get('/nap-tien', [DepositController::class, 'Deposit'])->name('customer.deposit.deposit');
//     Route::post('nap-tien', [DepositController::class, 'PostDeposit']);
//     Route::get('vnpay/return', [DepositController::class, 'VnpayReturn'])->name('vnpay.return');


//     Route::get('/them-vao-gio-hang/{id_product}', [CartController::class, 'AddToCart']);
//     Route::get('/giam-san-pham/{id_cart_item}', [CartController::class, 'DowProduct']);
//     Route::get('/them-san-pham/{id_cart_item}', [CartController::class, 'UpProduct']);
//     Route::get('/xoa-san-pham/{id_cart_item}', [CartController::class, 'RemoveProduct']);
//     Route::post('/thanh-toan', [CartController::class, 'Payment']);


//     Route::get('/lich-su-giao-dich', [TransactionController::class, 'Index']); 
// });

