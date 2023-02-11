<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\FreeshipRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\FreeshipResource;

class FreeshipApiController extends Controller
{
    protected $repository;
    public function __construct( FreeshipRepositoryInterface $repository ){
        $this->repository = $repository;
    }
    /**
     * api get informtion voucher freeship by voucher id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\FreeshipResource|\Illuminate\Http\JsonResponse
     */
    public function show( $id ){
        $freeship = $this->repository->show( $id );

        if( $freeship == null ){
            return response()->json(
                [
                    'message' => "Freeship voucher not exit.",
                ]
            );
        }

        return new FreeshipResource( $freeship );
    }
}
