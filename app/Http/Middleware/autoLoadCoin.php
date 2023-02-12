<?php

namespace App\Http\Middleware;

use App\Models\UserVoucher;
use Closure;
use Illuminate\Http\Request;
use App\Models\CoinCard;
use Illuminate\Support\Facades\Http;
use App\Models\ProductAttribute;

use Carbon\Carbon;


class autoLoadCoin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $users =  $this->createUserPoin();
        $products = $this->productCoin();
        $request->merge(compact('products'));
        return $next($request);
    }

    public function createUserPoin()
    {
        // $response = Http::timeout(4)->get("https://63b964c03329392049f25570.mockapi.io/api/v1/products");
        $response = Http::timeout(4)->get("https://api-admin-dype.onrender.com/api/user");
        if (!isset($response["statusCode"])) {
            $users = $response;
            if (!is_array($response))
                $users = json_decode($response, true);
            $userCoins = CoinCard::all();
            $userIds = [];
            $userCoinIds = [];

            //coin and discount default
            $coin = 0;

            foreach ($users as $element) {
                $userIds[] = $element["id"];
            }

            foreach ($userCoins as $element) {
                $userCoinIds[] = $element["user_id"];
            }

            foreach ($users as $user) {
                if (!in_array($user["id"], $userCoinIds)) { // add
                    CoinCard::insert(
                        [
                            'user_id' => $user["id"],
                            'name' => $user["name"],
                            'phone' => $user["phoneNumber"],
                            'email' => $user["email"],
                            'coin' => $coin,
                        ]
                    );
                } else {
                    $coinCard = CoinCard::find($user["id"]);
                    $coinCard->name = $user["name"];
                    $coinCard->phone = $user["phoneNumber"];
                    $coinCard->email = $user["email"];
                    $coinCard->save();
                }
            }

            foreach ($userCoins as $userCoin) {
                if (!in_array($userCoin["user_id"], $userIds)) { // delete
                    UserVoucher::where("user_id", $userCoin["user_id"])->delete();
                    CoinCard::find($userCoin["user_id"])->delete();
                }
            }
        }
        return $response;
    }
    public function productCoin()
    {
        $response = Http::timeout(4)->get("https://p01-product-api-production.up.railway.app/api/user/products");
        $products = $response["data"];
        $productsAttrs = ProductAttribute::all();
        $productIds = [];
        $productAttrIds = [];

        //coin and discount default
        $coin = 0;
        $discount = 0;
        foreach ($products as $element) {
            $productIds[] = $element["id"];
        }

        foreach ($productsAttrs as $element) {
            $productAttrIds[] = $element["product_id"];
        }

        foreach ($products as $product) {
            if (!in_array($product["id"], $productAttrIds)) { // add
                ProductAttribute::insert(
                    [
                        'product_id' => $product["id"],
                        'name' => $product["name"],
                        'coin' => $coin,
                        'discount' => $discount,
                        'created_at' => $product["created_at"] ? Carbon::parse($product["created_at"])->toDateTimeString() : NULL,
                        'updated_at' => $product["updated_at"] ? Carbon::parse($product["updated_at"])->toDateTimeString() : NULL,
                    ]
                );
            } else {
                $productCoin = ProductAttribute::find($product["id"]);
                $productCoin->name = $product["name"];
                $productCoin->created_at = $product["created_at"] ? Carbon::parse($product["created_at"])->toDateTimeString() : NULL;
                $productCoin->updated_at = $product["updated_at"] ? Carbon::parse($product["updated_at"])->toDateTimeString() : NULL;
                $productCoin->save();
            }
        }

        foreach ($productsAttrs as $productsAttr) {
            if (!in_array($productsAttr["product_id"], $productIds)) { // delete
                ProductAttribute::find($productsAttr["product_id"])->delete();
            }
        }
        return $response;
    }
}