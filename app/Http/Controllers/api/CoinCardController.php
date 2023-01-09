<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoinCardResource;
use App\Models\CoinCard;
use Illuminate\Http\Request;

class CoinCardController extends Controller
{
    //
    public function show($id){
        $user = CoinCard::where('user_id', $id)->first();
        return new CoinCardResource($user);
    }

    public function refund(Request $request){
        $user = CoinCard::where('user_id', $request->user_id)->first();

        if($user){
            $user_coin = $user->coin + $request->coin;
            CoinCard::where('user_id', $request->user_id)->update(['coin'=> $user_coin]);
            $user = CoinCard::where('user_id', $request->user_id)->first();
            return new CoinCardResource($user);
        }else {
            return response()->json([
                'error' => "user not avaiable",
            ]);
        }

        
    }
}
