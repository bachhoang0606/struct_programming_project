<?php
namespace App\Repositories;

use App\Contracts\Repositories\FreeshipRepositoryInterface;
use App\Models\Freeship;

class FreeshipRepository implements FreeshipRepositoryInterface {
    public function index() {
        $freeships = Freeship::all();
        return $freeships;
    }

    public function show( $id ) {
        $freeship = Freeship::where( 'voucher_id', $id )->first();
        return $freeship;
    }

    public function destroy( $id ) {

    }

    public function store( $attributes ){

    }

    public function update( $id, $price ){
        Freeship::where( 'voucher_id', $id )
        ->update(
            [
                'price'=> $price
            ]
        );
    }
}