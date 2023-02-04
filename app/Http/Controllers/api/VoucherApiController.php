<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoinCardResource;
use App\Http\Resources\VoucherResource;
use App\Models\CoinCard;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Util\Percentage;

class VoucherApiController extends Controller
{
    //
    public function index()
    {
        $vouchers = Voucher::all();
        return VoucherResource::collection($vouchers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         //
         $result = DB::transaction(function() use ($request, $id){
            $voucher_date = $request->only(['title', 'content', 'minimun_price', 'quantium', 'expiration_date', 'effective_date']);
            Voucher::where('id', $id)->update($voucher_date);

            if($request->Vtype == 'freeships'){
                Voucher::where('id', $id)->update(['type' => 1]);
                Freeship::where('voucher_id', $id)->update([
                    'price' => $request->price,
                ]);
            }elseif ($request->Vtype == 'priceDiscounts'){
                Voucher::where('id', $id)->update(['type' => 2]);
                PriceDiscount::where('voucher_id', $id)->update([
                    'price' => $request->price,
                ]);
            }else{
                Voucher::where('id', $id)->update(['type' => 3]);
                PercentDiscount::where('voucher_id', $id)->update([
                    'percent' => $request->percent,
                    'max_price' => $request->max_price,
                ]);
            }
        });

        if($result){
            $freeships = Freeship::all();
            $price_discounts = PriceDiscount::all();
            $percent_discounts = PercentDiscount::all();
            return view("vouchers.index", ['freeships' => $freeships, 'price_discounts' => $price_discounts, 'percent_discounts' => $percent_discounts]);
        }else{
            return view("vouchers.create")->with('error', 'Some error occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $voucher = Voucher::find($id);
        if ($voucher->type == 1){
            // freeship
            Freeship::where('voucher_id', $id)->delete();
        }elseif ($voucher->type == 2){
            // priceDiscounts
            PriceDiscount::where('voucher_id', $id)->delete();
        }else{
            PercentDiscount::where('voucher_id', $id)->delete();
        }

        UserVoucher::where('voucher_id', $id)->delete();

        $voucher->delete();
        $freeships = Freeship::all();
        $price_discounts = PriceDiscount::all();
        $percent_discounts = PercentDiscount::all();
        return view("vouchers.index", ['freeships' => $freeships, 'price_discounts' => $price_discounts, 'percent_discounts' => $percent_discounts]);
        //return '{"msg":"successful"}';
    }   
}