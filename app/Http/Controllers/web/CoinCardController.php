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
        $coin_cards = CoinCard::all();
        return view(
            'coin_cards.admins.index', 
            [
                'coin_cards' => $coin_cards
            ]
        );
    }
}
