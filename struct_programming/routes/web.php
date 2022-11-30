<?php

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

    return view('layouts/layouts');
    //return view('vouchers.create');
});

Route::resource('vouchers', VoucherController::class);

Route::get('index', [VoucherController::class, 'index']);

Route::get('vouchers', [VoucherController::class, 'create']);


Route::get('/poin_card', [VoucherController::class, 'poin_card']);

