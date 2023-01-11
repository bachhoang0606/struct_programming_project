<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\ChartController;
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
Route::resource('vouchers', VoucherController::class);

Route::get('/users/ui/voucherList/all/{id}', [VoucherController::class, 'displayAll'])->name('displayAll');
Route::get('/users/ui/voucherList/freeships/{id}', [VoucherController::class, 'displayFreeships'])->name('displayFreeships');
Route::get('/users/ui/voucherList/percent/{id}', [VoucherController::class, 'displayPercent'])->name('displayPercent');
Route::get('/users/ui/voucherList/price/{id}', [VoucherController::class, 'displayPrice'])->name('displayPrice');

Route::get('/', [VoucherController::class, 'index'])->name('index');
Route::get('vouchers', [VoucherController::class, 'create'])->name('create');
Route::post('vouchers', [VoucherController::class, 'store'])->name('create');
Route::get('coin_card', [VoucherController::class, 'coin_card'])->name('coin_card')->middleware('loadcoin');

Route::get('/edit-voucher/{id}',[VoucherController::class, 'edit']);

Route::view('/del-voucher', 'vouchers.delete')->name('delete-voucher');

Route::get('choose-voucher/{id}', function ($id) {
    return view('vouchers.chooseVoucher', ['id' => $id]);
})->name('choose-voucher');

Route::get('product.index', [ProductController::class, 'index'])->name('product.index')->middleware('loadcoin');
Route::get('product.create', [ProductController::class, 'create'])->name('product.create');
Route::post('product.create', [ProductController::class, 'store'])->name('product.create');
Route::get('product.edit/{product_id}',[ProductController::class, 'edit'])->name('product.edit');
Route::put('product.update/{product_id}',[ProductController::class, 'update'])->name('product.update');