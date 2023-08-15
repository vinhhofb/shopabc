<?php

use App\Http\Controllers\Customer\Account\AccountController;
use App\Http\Controllers\Customer\Cart\CartController;
use App\Http\Controllers\Customer\Dashboard\InfomationController;
use App\Http\Controllers\Customer\Dashboard\ChangePasswordController;
use App\Http\Controllers\Customer\Dashboard\DepositController;
use App\Http\Controllers\Customer\Dashboard\OrderController;
use App\Http\Controllers\Customer\Dashboard\TransactionController;
use App\Http\Controllers\Customer\Dashboard\SupportController;
use App\Http\Controllers\Customer\Chat\ChatController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'checkuser'], function () {
    Route::get('/gio-hang', [CartController::class, 'Cart'])->name('index.cart.index');
    Route::get('/thong-tin-ca-nhan', [InfomationController::class, 'Index'])->name('customer.infomation.index');
    Route::post('/thong-tin-ca-nhan', [InfomationController::class, 'EditInfo']);
    Route::get('/doi-mat-khau', [ChangePasswordController::class, 'Index'])->name('customer.change-password.index');
    Route::post('/doi-mat-khau', [ChangePasswordController::class, 'ChangePasswordPost'])->name('customer.change-password.change-password-post');

    Route::get('/don-hang', [OrderController::class, 'Index']);

    Route::get('/dang-xuat', [AccountController::class, 'Logout'])->name('customer.logout.logout');


    Route::get('/nap-tien', [DepositController::class, 'Deposit'])->name('customer.deposit.deposit');
    Route::post('nap-tien', [DepositController::class, 'PostDeposit']);
    Route::get('vnpay/return', [DepositController::class, 'VnpayReturn'])->name('vnpay.return');


    Route::get('/them-vao-gio-hang/{id_product}', [CartController::class, 'AddToCart']);
    Route::get('/giam-san-pham/{id_cart_item}', [CartController::class, 'DowProduct']);
    Route::get('/them-san-pham/{id_cart_item}', [CartController::class, 'UpProduct']);
    Route::get('/xoa-san-pham/{id_cart_item}', [CartController::class, 'RemoveProduct']);
    Route::post('/thanh-toan', [CartController::class, 'Payment']);


    Route::get('/lich-su-giao-dich', [TransactionController::class, 'Index']);
    Route::get('/tro-chuyen/{user_id}', [ChatController::class, 'Index']);

    Route::get('/yeu-cau-ho-tro', [SupportController::class, 'Support']);
});

