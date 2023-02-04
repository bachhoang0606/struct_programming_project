<?php

use App\Http\Controllers\api\CalulatorApiController;
use App\Http\Controllers\api\CoinCardApiController;
use App\Http\Controllers\api\ProductAttributeApiController;
use App\Http\Controllers\api\UserVoucherApiController;
use App\Http\Controllers\api\VoucherApiController;
use Illuminate\Support\Facades\Route;

// product api controller
Route::get('/product-coin/{id}', [ProductAttributeApiController::class, 'showCoin']);
Route::get('/products-sale-price', [ProductAttributeApiController::class, 'index']);

// coin card api controller
Route::get('/user-coin/{id}', [CoinCardApiController::class, 'show']);
Route::get('/refund', [CoinCardApiController::class, 'refund']);

// user voucher api controller
Route::post('/create-user-voucher', [UserVoucherApiController::class, 'store']);
Route::get('/user-has-voucher', [UserVoucherApiController::class, 'userHasVoucher']);
Route::get('/user-has-voucher/{id}', [UserVoucherApiController::class, 'userHasVoucherWithId']);

// caculator api controller
Route::get('/discount-price', [CalulatorApiController::class, 'payment']);

// voucher api controller
Route::get('/vouchers', [VoucherApiController::class, 'index']);
Route::put('/vouchers/update/{id}', [VoucherApiController::class, 'update']);
Route::delete('/vouchers/delete/{id}', [VoucherApiController::class, 'destroy']);



