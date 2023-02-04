<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAttributeResource;
use App\Models\ProductAttribute;

class ProductAttributeApiController extends Controller
{
    /**
     * api get the number of coins and the percentage of products to be reduced by product id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\ProductAttributeResource
     */
    public function show_coin( $id ){
        $product_coin = ProductAttribute::where( 'product_id', $id )
        ->first();
        return new ProductAttributeResource( $product_coin );
    }

    /**
     * api get the number of coins and product percentage off of all products in stock.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\ProductAttributeResource|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(){

        $products = ProductAttribute::all();

        return ProductAttributeResource::collection( $products );
    } 
}