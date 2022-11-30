<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoucherController;


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

Route::get('/', function () {
    return view('vouchers.create');
 
});

Route::resource('vouchers', VoucherController::class);

Route::get('index', [VoucherController::class, 'index'])->name('index');
Route::get('vouchers', [VoucherController::class, 'create'])->name('create');
Route::post('vouchers', [VoucherController::class, 'store'])->name('create');
Route::get('/poin_card', [VoucherController::class, 'poin_card'])->name('poin_card');


Route::get('product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/create', [ProductController::class, 'store'])->name('product.create');