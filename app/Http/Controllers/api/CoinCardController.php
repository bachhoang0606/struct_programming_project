<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoinCardResource;
use App\Models\CoinCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function createUserPoin(){
        $response = Http::timeout(10)->get("https://63b964c03329392049f25570.mockapi.io/api/v1/products");
        $users = $response;
        if(!is_array($response))
            $users = json_decode($response, true);
        $userCoins = CoinCard::all();
        $userIds = [];
        $userCoinIds = [];
        $add = [];
        $delete = [];

        //coin and discount default
        $coin = 0;

        foreach($users as $element){
            $userIds[] = $element["id"];
        }

        foreach($userCoins as $element){
            $userCoinIds[] = $element["user_id"];
        }

        foreach($users as $user){
            if(!in_array($user["id"], $userCoinIds)){ // add
                $add[] = CoinCard::insert(['user_id' => $user["id"],
                                                'name' => $user["name"],
                                                'phone' => $user["phoneNumber"],
                                                'email' => $user["email"],
                                                'coin' => $coin,
                                                'created_at' => NULL,
                                                'updated_at' => NULL,]);
            }
        }

        foreach($userCoins as $userCoin){
            if(!in_array($userCoin["user_id"], $userIds)){ // delete
                $delete[] = CoinCard::find($userCoin["user_id"])->delete();
            }
        }
        $result = ["add" => $add, "delete" => $delete];

        return $result;
    }
}
