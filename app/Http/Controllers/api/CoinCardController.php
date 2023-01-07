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

    public function createUserPoin(){
        $users = Http::timeout(6)->get("https://jsonplaceholder.typicode.com/users");
        $arrayUsers = json_decode($users, true);
        $countUser = count($arrayUsers);
        $usersPoin = CoinCard::all();
        $arrayUsersPoin = json_decode($usersPoin, true);
        $countUsersPoin = count($arrayUsersPoin);
        $arr = [];
        $result = [];
        if($countUser != $countUsersPoin ){
            foreach($arrayUsers as $user){
                foreach($arrayUsersPoin as $userPoin){
                    if($user["id"] == $userPoin["user_id"]){
                        $arr[] = $user["id"];
                    }
                }
                // $arr[] = $user["id"];
            }
            if($countUser > $countUsersPoin){
                
                $arr[] = -1;
                foreach($arrayUsers as $user){
                    if(!array_key_exists($user["id"], $arr)){
                        //add
                        $coin = 0;
                        $result[] = CoinCard::insert(['user_id' => $user["id"], 
                                                    'name' =>$user["name"],
                                                    'phone' => '0123456789',
                                                    'email' =>$user["email"],
                                                    'coin' => $coin]);
                    }
                }
            }else if($countUser < $countUsersPoin){
                $arr[] = -1;
                foreach($arrayUsersPoin as $userPoin){
                    if(!array_key_exists($userPoin["user_id"], $arr)){
                        //remmote
                        $result[] = CoinCard::where("user_id", $userPoin["user_id"])->first()->delete();
                    }
                }
            }
        }
        return $result;
    }
}