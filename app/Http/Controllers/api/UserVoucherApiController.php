<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserVoucherResource;
use App\Models\CoinCard;
use App\Models\UserVoucher;
use App\Models\Voucher;
use Illuminate\Http\Request;

class UserVoucherApiController extends Controller
{

    /**
     * api saves vouchers for the user when the user receives a new voucher.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( Request $request ){

        $voucher_id = $request->voucher_id;
        $user_id = $request->user_id;

        $voucher = Voucher::find( $voucher_id );
        if( $voucher == null ){
            return response()->json(
                [ 
                    'message' => 
                    "not have voucher id", 
                ]
            );
        }
        $row = UserVoucher::where( "user_id", $user_id )
        ->where( "voucher_id", $voucher_id )
        ->first();

        if( $row ){
            return response()->json(
                [ 
                    'message' => "user had this voucher", 
                ]
            );
        }
        // get user vouchers list
        $user_voucher = UserVoucher::create( $request->all() );

        if( $user_voucher ){

            return response()->json( UserVoucher::all() );
        }else{

            return response()->json(
                [ 
                    'message' => "error", 
                ]
            );
        }
    }

    /**
     * api returns all vouchers that each user has.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection 
     */
    public function userHasVoucher( ){ 
        return UserVoucherResource::collection( CoinCard::all() );
    }

    /**
     * api returns all vouchers the user has.
     *
     * @param int $id
     * @return \App\Http\Resources\UserVoucherResource
     */
    public function userHasVoucherWithId( $id ){  

        return new UserVoucherResource( CoinCard::find( $id ) );
    }   
}
