<?php
namespace App\Repositories;

use App\Contracts\Repositories\CoinCardRepositoryInterface;
use App\Models\CoinCard;

class CoinCardRepository implements CoinCardRepositoryInterface {
    public function index() {
        $coin_cards = CoinCard::all();
        return $coin_cards;
    }

    public function show( $id ) {
        $coin_card = CoinCard::where( 'user_id', $id )->first();
        return $coin_card;
    }

    public function destroy( $id ) {

    }

    public function store( $attributes ){

    }

    public function update( $id, $coin ){
        CoinCard::where( 'user_id', $id )
        ->update(
            [
                'coin'=> $coin
            ]
        );
    }
}