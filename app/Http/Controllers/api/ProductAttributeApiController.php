<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAttributeResource;
use App\Models\ProductAttribute;

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
}