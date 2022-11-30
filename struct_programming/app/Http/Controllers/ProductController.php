<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    //  list poin and discount
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

    }
}
