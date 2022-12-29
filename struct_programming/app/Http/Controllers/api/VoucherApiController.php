<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherApiController extends Controller
{
    //
    public function index(){
        $vouchers = Voucher::all();
        return VoucherResource::collection($vouchers);
    }
}
