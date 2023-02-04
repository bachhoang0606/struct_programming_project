<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    //  list coin and discount
    public function index(){

        $products = ProductAttribute::all();
        return view('products.admins.index', ['products' => $products]);
    }

    // display form create
    public function create(){
        return view('products.create');
    }

    // save new product
    public function store(Request $request){
        $query =ProductAttribute::where('product_id', $request->product_id)
        ->update([
            'coin' => $request->coin,
            'discount' => $request->discount,
        ]);

        if($query){
            return view('products.create')->with('status', 'Update successful');
        }else{
            return view('products.create')->with('error', 'Some error occurred');
        }
    }
    public function edit($product_id)
    {
        $products = ProductAttribute::find($product_id);
        return view('products.admins.edit',compact('products'));

    }
    public function update(Request $request,$product_id)
    {
        $data = $request;
        $products = ProductAttribute::find($product_id);
        $products->coin = $data['coin'];
        $products->discount = $data['discount'];
        $products->update();
        return redirect('product.index')->with('message','Product Updated Successfully');

    }

}
