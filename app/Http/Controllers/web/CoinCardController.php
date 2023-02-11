<?php

namespace App\Http\Controllers\web;

use App\Contracts\Repositories\CoinCardRepositoryInterface;
use App\Http\Controllers\Controller;

class CoinCardController extends Controller
{
    protected $repository;

    public function __construct( CoinCardRepositoryInterface $repository ){
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index ()
    {
        $coin_cards = $this->repository->index();
        return view(
            'coin_cards.admins.index', 
            [
                'coin_cards' => $coin_cards,
            ]
        );
    }
}
