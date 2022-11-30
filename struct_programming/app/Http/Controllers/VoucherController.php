<?php

namespace App\Http\Controllers;

use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PoinCard;
use App\Models\PriceDiscount;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $price_discounts = PriceDiscount::all();
        $percent_discounts = PercentDiscount::all();
        return view("vouchers.index", ['freeships' => $freeships, 'price_discounts' => $price_discounts, 'percent_discounts' => $percent_discounts]);
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
        dd($request->all());
        $result = DB::transaction(function() use ($request){
            $voucher_date = $request->only(['title', 'content', 'minimun_price', 'quantium', 'products', 'effective_date','expiration_date']);
            $voucher = Voucher::create($voucher_date);

            if($voucher->Vtype === 'freeships'){
                Freeship::create([
                    'voucher_id' => $voucher->id,
                    'price' => $request->FP_price,
                ]);
            }elseif ($voucher->Vtype === 'priceDiscounts'){
                PriceDiscount::create([
                    'voucher_id' => $voucher->id,
                    'price' => $request->price,
                ]);
            }else{
                PercentDiscount::create([
                    'voucher_id' => $voucher->id,
                    'percent' => $request->percent,
                    'max_price' => $request->max_price,
                ]);
            }
        });

        if($result){
            return view("vouchers.create")->with('status', 'Create voucher successful');
        }else{
            return view("vouchers.create")->with('error', 'Some error occurred');
        }
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
