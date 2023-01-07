<?php

use App\Http\Controllers\api\CalulatorApiController;
use App\Http\Controllers\api\CoinCardController;
use App\Http\Controllers\api\ProductAttributeApiController;
use App\Http\Controllers\api\UserVoucherApiController;
use App\Http\Controllers\api\VoucherApiController;
use Illuminate\Support\Facades\Route;

Route::get('/product-coin/{id}', [ProductAttributeApiController::class, 'show_coin']);
Route::get('/products-sale-price', [ProductAttributeApiController::class, 'index']);


Route::get('/user-coin/{id}', [CoinCardController::class, 'show']);
Route::put('/refund', [CoinCardController::class, 'refund']);

Route::get('/vouchers', [VoucherApiController::class, 'index']);
Route::put('vouchers/update/{id}', [VoucherApiController::class, 'update']);
Route::delete('vouchers/delete/{id}', [VoucherApiController::class, 'destroy']);


Route::get('/discount-price', [CalulatorApiController::class, 'payment']);

Route::post('/create-user-voucher', [UserVoucherApiController::class, 'store']);

Route::get('/user-has-voucher', [UserVoucherApiController::class, 'userHasVoucher']);
Route::get('/user-has-voucher/{id}', [UserVoucherApiController::class, 'userHasVoucherWithId']);

Route::get('/create-user-coin', [CoinCardController::class, 'createUserPoin']);
