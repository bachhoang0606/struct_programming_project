<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVoucherResource;
use App\Http\Resources\VoucherResource;
use App\Models\CoinCard;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;

class UserVoucherApiController extends Controller
{
    //
    public function store(Request $request){

        $voucher_id = $request->voucher_id;
        $user_id = $request->user_id;

        $voucher = Voucher::find($voucher_id);
        if($voucher == null){
            return response()->json([
                'message' => "not have voucher id",
            ]);
        }

        // $voucher = User::find($voucher_id);
        // if($voucher){
        //     return response()->json([
        //         'message' => "not have voucher id",
        //     ]);
        // }


        $row = UserVoucher::where("user_id", $user_id)->where("voucher_id", $voucher_id)->first();
        if($row){
            return response()->json([
                'message' => "user had this voucher",
            ]);
        }

        $user_voucher = UserVoucher::create($request->all());
        if($user_voucher){
            return response()->json(UserVoucher::all());
        }else{
            return response()->json([
                'message' => "error",
            ]);
        }
    }

    public function userHasVoucher(){
        return UserVoucherResource::collection(CoinCard::all());
    }

    public function userHasVoucherWithId($id){
        return new UserVoucherResource(CoinCard::find($id));
    }   
}
