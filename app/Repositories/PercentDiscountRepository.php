<?php
namespace App\Repositories;

use App\Contracts\Repositories\PercentDiscountRepositoryInterface;
use App\Models\PercentDiscount;

class PercentDiscountRepository implements PercentDiscountRepositoryInterface {
    public function index() {
        $percent_discounts = PercentDiscount::all();
        return $percent_discounts;
    }

    public function show( $id ) {
        $percent_discount = PercentDiscount::where( 'voucher_id', $id )->first();
        return $percent_discount;
    }

    public function destroy( $id ) {

    }

    public function store( $attributes ){

    }

    public function update( $id, $attributes ){
        PercentDiscount::where( 'voucher_id', $id )
        ->update(
            $attributes
        );
    }
}