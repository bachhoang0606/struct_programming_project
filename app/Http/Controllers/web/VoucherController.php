<?php

namespace App\Http\Controllers\web;

use App\Contracts\Repositories\VoucherRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class VoucherController extends Controller
{
    protected $repository;
    public function __construct(VoucherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {

        $coin_cards = $this->repository->coinCards();
        $freeships = $this->repository->indexFreeship();
        $price_discounts = $this->repository->indexPriceDiscount();
        $percent_discounts = $this->repository->indexPercentDiscount();
        return view(
            "dashboards.admins.index",
            [
                'freeships' => $freeships, 
                'price_discounts' => $price_discounts, 
                'percent_discounts' => $percent_discounts,
                'coin_cards' => $coin_cards,
            ]
        );
    }


    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function freeship()
    {
        $freeships = $this->repository->indexFreeship();
        return view(
            "dashboards.admins.freeship", 
            [
                'freeships' => $freeships, 
            ]
        );
    }

    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function price_discount()
    {
        $price_discounts = $this->repository->indexPriceDiscount();
        return view(
            "dashboards.admins.price_discount", 
            [
                'price_discounts' => $price_discounts, 
            ]
        );
    }
    

    /**
     * Display a listing of the resource
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function percent_discount()
    {
        $percent_discounts = $this->repository->indexPercentDiscount();
        return view(
            "dashboards.admins.percent_discount", 
            [
                'percent_discounts' => $percent_discounts, 
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
        return view("vouchers.admins.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form data
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
                'minimun_price' => 'required|numeric|min:0',
                'quantium' => 'required|numeric|min:0',
                'effective_date' => 'required',
                'expiration_date' => 'required|after_or_equal:effective_date',
            ]
        );
        $this->repository->store($request);
        return redirect(route("index"))
            ->with('message', 'Create voucher successful');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        $voucher = $this->repository->show($id);
        
        return view(
            'vouchers.admins.edit',
            [
                'voucher' => $voucher
            ]
        );
    }
}