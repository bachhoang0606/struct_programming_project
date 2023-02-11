<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\PriceDiscountRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\PriceDiscountResource;

class PriceDiscountApiController extends Controller
{
    protected $repository;
    public function __construct( PriceDiscountRepositoryInterface $repository ){
        $this->repository = $repository;
    }
    /**
     * api get informtion voucher freeship by voucher id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PriceDiscountResource|\Illuminate\Http\JsonResponse
     */
    public function show( $id ){
        $price_discount = $this->repository->show( $id );

        if( $price_discount == null ){
            return response()->json(
                [
                    'message' => "Price Discount voucher not exit.",
                ]
            );
        }

        return new PriceDiscountResource( $price_discount );
    }
}
