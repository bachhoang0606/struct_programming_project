<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductAttributeResource;

class ProductAttributeApiController extends Controller
{
    protected $repository;
    public function __construct( ProductRepositoryInterface $repository ){
        $this->repository = $repository;
    }
    /**
     * api get the number of coins and the percentage of products to be reduced by product id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\ProductAttributeResource
     */
    public function show( $id ){
        $product_coin = $this->repository->show( $id );

        return new ProductAttributeResource( $product_coin );
    }

    /**
     * api get the number of coins and product percentage off of all products in stock.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\ProductAttributeResource|\Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(){

        $products = $this->repository->index();

        return ProductAttributeResource::collection( $products );
    } 
}