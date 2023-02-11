<?php
namespace App\Repositories;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Models\ProductAttribute;

class ProductRepository implements ProductRepositoryInterface {
    public function index() {
        $products = ProductAttribute::all();
        return $products;
    }

    public function show( $id ) {
        $product = ProductAttribute::where( 'product_id', $id )->first();
        return $product;
    }

    public function destroy( $id ) {

    }

    public function store( $attributes ){

    }
    public function update( $id, $update_array ){
        ProductAttribute::where( 'product_id', $id )
        ->update($update_array);
    }
}