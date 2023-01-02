<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\CoinCard;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;

class CalulatorApiController extends Controller
{
    //
    public function payment(Request $request){
        
        // kiem tra nguoi dung co voucher chon khong
        $user_voucher = UserVoucher::where('user_id', $request->user_id)->first();
        if($user_voucher == null){
            return response()->json([
                'error' => 'Nguoi dung khong co voucher nay'
            ]);
        }

        // kiem tra gia tri don hang toi thieu
        $voucher = Voucher::find($request->voucher_id);
        $total = $request->shipping_fee + $request->product_price;
        if($voucher->minimun_price > $total){
            return response()->json([
                'error' => 'Gia tri toi thieu khong thoa man'
            ]);
        }

        // tinh so tien duoc tru khi dung voucher
        if($request->type == 1){
            // neu la freeship

            $voucher = Freeship::where('voucher_id', $request->voucher_id)->first();

            $discount_price = $voucher->price;

            // neu so tien giam gia tren voucher lon hon so tien ship thuc te thi so tien duoc
            // giam bang so tien ship thuc te

            if($discount_price > $request->shipping_fee){
                $discount_price = $request->shipping_fee;
            } 

        }elseif ($request->type == 2){
            // neu la giam gia co dinh

            $voucher = PriceDiscount::where('voucher_id', $request->voucher_id)->first();
            $discount_price = $voucher->price;

        }elseif ($request->type == 3){
            // neu giam gia theo phan tram
            $voucher = PercentDiscount::where('voucher_id', $request->voucher_id)->first();
            $discount_price = $request->product_price * $voucher->percent / 100;

            if( $discount_price > $voucher->max_price){
                // neu so tien duoc giam lon hon so tien toi da duoc giam thi so tien duoc
                // giam bang so tien toi da duoc giam
                $discount_price = $voucher->max_price;
            }
        }

        // tinh toan so tien duoc tru khi dung diem
        $discount_price += $request->coin;

        // cap nhat lai xu cua nguoi dung
        $user = CoinCard::where('user_id', $request->user_id)->first();
        $user_coin = $user->Coin - $request->coin;
        if( $user_coin < 0 ){
            return response()->json([
                'error' => 'Nguoi dung khong du diem'
            ]);
        }
        $user = CoinCard::where('user_id', $request->user_id)->update(['Coin' => $user_coin]);

        // xoa voucher ra khoi bang voucher nguoi dung
        $user_voucher = UserVoucher::where('user_id', $request->user_id)->where('voucher_id', $request->voucher_id)->delete();

        return response()->json([
            'data' => [
                'discount_price' => $discount_price,
            ]
        ]);
    }
}
