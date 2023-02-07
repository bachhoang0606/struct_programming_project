<?php

use App\Http\Controllers\web\CoinCardController;
use App\Http\Controllers\web\DashboardController;
use App\Http\Controllers\web\ProductController;
use App\Http\Controllers\web\UserVoucherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\VoucherController;
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


Route::get('/', [DashboardController::class, 'index'])->name('index');
Route::get('/freeship', [VoucherController::class, 'freeship'])->name('freeship');
Route::get('/price_discount', [VoucherController::class, 'price_discount'])->name('price_discount');
Route::get('/percent_discount', [VoucherController::class, 'percent_discount'])->name('percent_discount');

// Route::get('/', [ChartController::class, 'index'])->name('index');
Route::group( ['prefix' => 'admins/'] , function () {

    // products controller routes
    Route::get('product.index', [ProductController::class, 'index'])->name('product.index');//->middleware('loadcoin');
    Route::get('product.create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product.create', [ProductController::class, 'store'])->name('product.create');
    Route::get('product.edit/{product_id}',[ProductController::class, 'edit'])->name('product.edit');
    Route::put('product.update/{product_id}',[ProductController::class, 'update'])->name('product.update');

    // vouchers controller routes
    Route::resource('vouchers', VoucherController::class);
    Route::view('del-voucher', 'vouchers.admins.delete')->name('delete-voucher');
    Route::get('edit-voucher/{id}',[VoucherController::class, 'edit']);
    Route::get('vouchers', [VoucherController::class, 'create'])->name('create');
    Route::post('vouchers', [VoucherController::class, 'store'])->name('create');

    // coin card controller routes
    Route::get('coin_cards', [CoinCardController::class, 'index'])->name('coin_cards.index');//->middleware('loadcoin');
});


Route::group( ['prefix' => 'users/'] , function () {

    // users vouchers controller routes
    Route::get('voucherList.all/{id}', [UserVoucherController::class, 'displayAll'])->name('displayAll');
    Route::get('voucherList.freeships/{id}', [UserVoucherController::class, 'displayFreeships'])->name('displayFreeships');
    Route::get('voucherList.percent/{id}', [UserVoucherController::class, 'displayPercent'])->name('displayPercent');
    Route::get('voucherList.price/{id}', [UserVoucherController::class, 'displayPrice'])->name('displayPrice');
    Route::get('choose-voucher/{id}', function ($id) {
        return view('user_vouchers.users.chooseVoucher', ['id' => $id]);
    })->name('choose-voucher');
});