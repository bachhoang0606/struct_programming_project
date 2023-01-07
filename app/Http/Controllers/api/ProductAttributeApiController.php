<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAttributeResource;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;

class ProductAttributeApiController extends Controller
{
    //
    public function show_coin($id){
        $product_coin = ProductAttribute::where('product_id', $id)->first();
        // dd($product_coin);
        return new ProductAttributeResource($product_coin);
    }

    public function index(){
        $products = ProductAttribute::all();
        return ProductAttributeResource::collection($products);
    }

    public function productCoin(){
        $response = Http::timeout(10)->get("https://p01-product-api-production.up.railway.app/api/user/products");
        $products = $response["data"];
        $productsAttrs = ProductAttribute::all();
        $productIds = [];
        $productAttrIds = [];
        $add = [];
        $delete = [];

        //coin and discount default
        $coin = 0;
        $discount = 0;
        foreach($products as $element){
            $productIds[] = $element["id"];
        }

        foreach($productsAttrs as $element){
            $productAttrIds[] = $element["product_id"];
        }

        foreach($products as $product){
            if(!in_array($product["id"], $productAttrIds)){ // add
                $add[] = ProductAttribute::insert(['product_id' => $product["id"],
                                                'name' => $product["name"],
                                                'coin' => $coin,
                                                'discount' => $discount,
                                                'created_at' => $product["created_at"] ? Carbon::parse($product["created_at"])->toDateTimeString() : NULL,
                                                'updated_at' => $product["updated_at"] ? Carbon::parse($product["updated_at"])->toDateTimeString() : NULL,]);
            }
        }

        foreach($productsAttrs as $productsAttr){
            if(!in_array($productsAttr["product_id"], $productIds)){ // delete
                $delete[] = ProductAttribute::find($productsAttr["product_id"])->delete();
            }
        }
        $result = ["add" => $add, "delete" => $delete];
        return $result;
    }
}