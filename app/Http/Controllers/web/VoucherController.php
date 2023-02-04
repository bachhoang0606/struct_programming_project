<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $freeships = Freeship::all();
        $price_discounts = PriceDiscount::all();
        $percent_discounts = PercentDiscount::all();

        return view(
            "dashboards.admins.index", 
            [
                'freeships' => $freeships, 
                'price_discounts' => $price_discounts, 
                'percent_discounts' => $percent_discounts
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
    public function store( Request $request )
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

        // must all action is successful
        DB::transaction( function () use ( $request ) {

            $voucher_date = $request->only(
                [
                    'title', 
                    'content', 
                    'minimun_price', 
                    'quantium', 
                    'expiration_date', 
                    'effective_date'
                ]
            );
            $voucher = Voucher::create( $voucher_date );
            if ($request->Vtype == 'freeships') { 

                Voucher::where('id', $voucher->id)->update(
                    [
                        'type' => 1
                    ]
                );

                Freeship::create([

                    'voucher_id' => $voucher->id,
                    'price' => $request->price,
                ]);
            } elseif ( $request->Vtype == 'priceDiscounts' ) {
                Voucher::where('id', $voucher->id)->update(

                    [
                        'type' => 2
                    ]
                );
                PriceDiscount::create(
                    [
                        'voucher_id' => $voucher->id,
                        'price' => $request->price
                    ]
                );
            } else {
                Voucher::where('id', $voucher->id)->update(
                    [
                        'type' => 3
                    ]
                );
                PercentDiscount::create([
                    'voucher_id' => $voucher->id,
                    'percent' => $request->percent,
                    'max_price' => $request->max_price,
                ]);
            }
        });

        return redirect( route( "index" ) )
        ->with( 'message', 'Create voucher successful' );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit( $id )
    {
        return view(
            'vouchers.admins.edit', 
            [
                'id' => $id
            ]
        );
    }
}