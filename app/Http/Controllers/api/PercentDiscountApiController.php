<?php

namespace App\Http\Controllers\api;
use App\Contracts\Repositories\PercentDiscountRepositoryInterface;
use App\Http\Resources\PercentDiscountResource;
use Illuminate\Routing\Controller;

class PercentDiscountApiController extends Controller
{
    protected $repository;
    public function __construct( PercentDiscountRepositoryInterface $repository ){
        $this->repository = $repository;
    }
    /**
     * api get informtion voucher freeship by voucher id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PercentDiscountResource|\Illuminate\Http\JsonResponse
     */
    public function show( $id ){
        $percent_discount = $this->repository->show( $id );

        if( $percent_discount == null ){
            return response()->json(
                [
                    'message' => "Percent Discount voucher not exit.",
                ]
            );
        }

        return new PercentDiscountResource( $percent_discount );
    }
}
