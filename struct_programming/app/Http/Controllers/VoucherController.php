<?php

namespace App\Http\Controllers;

use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PoinCard;
use App\Models\PriceDiscount;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $freeships = Freeship::all();
        $priceDiscount = $freeships->merge(PriceDiscount::all());
        $voucher_list = $priceDiscount->merge(PercentDiscount::all());
        return view("vouchers.index", ['voucher_list' => $voucher_list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("vouchers.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // GET method
    public function poin_card(){

        $poinCards = PoinCard::all();
        return view('vouchers.poin_card', ['poinCards' => $poinCards]);
    }
}
