<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VoucherApiController extends Controller
{
    /**
     * api returns a list of all available vouchers.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection 
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return VoucherResource::collection( $vouchers );
    }

    /**
     * api stores updates on a voucher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( Request $request, $id )
    {
        $validator = Validator::make( $request->all(), [
            'title' => 'required',
            'content' => 'required',
            'minimun_price' => 'required|numeric|min:0',
            'quantium' => 'required|numeric|min:0',
            'effective_date' => 'required',
            'expiration_date' => 'required|after_or_equal:effective_date',
        ]);

        if ( $validator->fails() ) {
            return response()->json( $validator->errors(), 404 );
        }

        $result = DB::transaction(function () use ( $request, $id ) {
            $voucher_date = $request->only(
                [
                    'title',
                    'content',
                    'minimun_price',
                    'quantium',
                    'expiration_date',
                    'effective_date'
                ]
            );
            Voucher::where('id', $id)
                ->update($voucher_date);

            if ($request->Vtype == 'freeships') {
                // update freeship voucher
                Voucher::where('id', $id)
                    ->update(
                        [
                            'type' => 1
                        ]
                    );

                Freeship::where('voucher_id', $id)
                    ->update(
                        [
                            'price' => $request->price,
                        ]
                    );

            } elseif ($request->Vtype == 'priceDiscounts') {
                // update price discounts voucher
                Voucher::where('id', $id)
                    ->update(
                        [
                            'type' => 2
                        ]
                    );

                PriceDiscount::where('voucher_id', $id)
                    ->update(
                        [
                            'price' => $request->price
                        ]
                    );
            } else {
                // update percent discounts voucher
                Voucher::where('id', $id)
                    ->update(
                        [
                            'type' => 3
                        ]
                    );
                PercentDiscount::where('voucher_id', $id)
                    ->update(
                        [
                            'percent' => $request->percent,
                            'max_price' => $request->max_price
                        ]
                    );
            }
        });

        return response()->json(
            [
                'message' => "Voucher update successful.",
            ]
        );
    }

    /**
     * api remove the specified voucher from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( $id )
    {
        $voucher = Voucher::find( $id );
        if ($voucher->type == 1) {

            // delete voucher freeship
            Freeship::where( 'voucher_id', $id )->delete();
        } elseif ($voucher->type == 2) {

            // delete voucher price discounts
            PriceDiscount::where( 'voucher_id', $id )->delete();
        } else {

            // delete voucher percent discounts
            PercentDiscount::where( 'voucher_id', $id )->delete();
        }

        // delete voucher with id
        UserVoucher::where( 'voucher_id', $id )
            ->delete();
        $voucher->delete();
        
        return response()->json(
            [
                'message' => "Successfully deleted voucher.",
            ]
        );
    }
}