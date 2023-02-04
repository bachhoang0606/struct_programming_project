<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index(){

        $products = ProductAttribute::all();
        return view(
            'products.admins.index', 
            [
                'products' => $products
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create(){
        return view( 'products.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request ){
        $query = ProductAttribute::where( 'product_id', $request->product_id )
        ->update([
            'coin' => $request->coin,
            'discount' => $request->discount,
        ]);

        if( $query ){
            return view( 'products.create' )
            ->with( 'status', 'Update successful' );
        }else{
            return view( 'products.create' )
            ->with( 'error', 'Some error occurred' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product_id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit( $product_id )
    {
        $products = ProductAttribute::find( $product_id );
        return view(
            'products.admins.edit',
            compact( 'products' )
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $product_id )
    {
        $validated = $request->validate(
            [ 
                'coin' => 'required|numeric|min:0', 
                'discount' => 'required|numeric|min:0|max:100', 
            ]
        );
        $data = $request;
        $products = ProductAttribute::find( $product_id );

        $products->coin = $data['coin'];
        $products->discount = $data['discount'];

        $products->update();

        return redirect( route('product.index') )
        ->with( 'message','Product updated successfully' );

    }

}
