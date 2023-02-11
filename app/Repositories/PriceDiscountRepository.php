<?php
namespace App\Repositories;

use App\Contracts\Repositories\PriceDiscountRepositoryInterface;
use App\Models\PriceDiscount;

class PriceDiscountRepository implements PriceDiscountRepositoryInterface {
    public function index() {
        $price_discounts = PriceDiscount::all();
        return $price_discounts;
    }

    public function show( $id ) {
        $price_discount = PriceDiscount::where( 'voucher_id', $id )->first();
        return $price_discount;
    }

    public function destroy( $id ) {

    }

    public function store( $attributes ){

    }

    public function update( $id, $price ){
        PriceDiscount::where( 'voucher_id', $id )
        ->update(
            [
                'price'=> $price
            ]
        );
    }
}