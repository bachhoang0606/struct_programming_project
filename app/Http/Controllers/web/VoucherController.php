<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\CoinCard;
use App\Models\PriceDiscount;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Resources\UserVoucherResource;


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

    public function displayAll($id)
    {
        $vouchers = Voucher::all();
        $freeships = Freeship::all();
        $price_discounts = PriceDiscount::all();
        $percent_discounts = PercentDiscount::all();
        $data = new UserVoucherResource(CoinCard::find($id));
        
        return view(
            "vouchers.users.all",
            [
                'data' => $data, 
                'freeships' => $freeships, 
                'price_discounts' => $price_discounts, 
                'vouchers' => $vouchers, 
                'percent_discounts' => $percent_discounts, 
                'id' => $id
            ]
        );  
    }

    public function displayFreeships($id)
    {
        $freeships = Freeship::all();
        $vouchers = Voucher::all();
        $data = new UserVoucherResource(CoinCard::find($id));
        return view(
            "vouchers.users.freeships", 
            [
                'data' => $data, 
                'freeships' => $freeships
            ], 
            [
                'vouchers' => $vouchers, 
                'id' => $id
            ]
        );
    }

    public function displayPercent($id)
    {
        $percent_discounts = PercentDiscount::all();
        $vouchers = Voucher::all();
        $data = new UserVoucherResource(CoinCard::find($id));
        return view(
            "vouchers.users.percent", 
            [
                'data' => $data, 
                'percent_discounts' => $percent_discounts
            ], 
            [
                'vouchers' => $vouchers, 
                'id' => $id
            ]
        );
    }

    public function displayPrice($id)
    {
        $price_discounts = PriceDiscount::all();
        $vouchers = Voucher::all();
        $data = new UserVoucherResource(CoinCard::find($id));
        return view(
            "vouchers.users.price", 
            [
                'data' => $data, 
                'price_discounts' => $price_discounts
            ], 
            [
                'vouchers' => $vouchers, 
                'id' => $id
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
        //
        $result = DB::transaction(function () use ( $request ) {
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
                PriceDiscount::create([
                    'voucher_id' => $voucher->id,
                    'price' => $request->price,
                ]);
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

        if ($result) {
            return view("vouchers.index")->with('status', 'Create voucher successful');
        } else {
            return view("vouchers.admins.create")->with('error', 'Some error occurred');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function edit($id)
    {
        //make change here
        //echo $id;
        return view(
            'vouchers.admins.edit', 
            [
                'id' => $id
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function coin_card()
    {
        $coinCards = CoinCard::all();
        return view(
            'coin_cards.admins.index', 
            [
                'coinCards' => $coinCards
            ]
        );
    }
}