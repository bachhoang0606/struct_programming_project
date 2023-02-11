<?php

namespace App\Http\Controllers\web;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $repository;
    public function __construct(ProductRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index(Request $request)
    {

        $products = $this->repository->index();
        // get data from api
        $products_api = $request->products['data'];
        return view(
            'products.admins.index',
            [
                'products' => $products,
                'products_api' => $products_api,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $update_array = [
            'coin' => $request->coin,
            'discount' => $request->discount,
        ];

        $id = $request->product_id;
        $query = $this->repository->update($id, $update_array);

        if ($query) {
            return view('products.create')
                ->with('status', 'Update successful');
        } else {
            return view('products.create')
                ->with('error', 'Some error occurred');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit(Request $request, $product_id)
    {
        $products = $this->repository->show($product_id);
        $image_url = $request->image_url;
        return view(
            'products.admins.edit',
            compact('products', 'image_url')
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $request->validate(
            [
                'coin' => 'required|numeric|min:0',
                'discount' => 'required|numeric|min:0|max:100',
            ]
        );

        $update_array = [
            'coin' => $request->coin,
            'discount' => $request->discount,
        ];

        $this->repository->update($product_id, $update_array);

        return redirect(route('product.index'))
            ->with('message', 'Product updated successfully');
    }

}