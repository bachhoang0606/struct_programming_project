<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    //  list coin and discount
    public function index(){

        $products = ProductAttribute::all();
        return view('products.index', ['products' => $products]);
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
}
