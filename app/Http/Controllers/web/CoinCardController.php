<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\CoinCard;

class CoinCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index ()
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
