<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\CoinCardRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CoinCardResource;
use Illuminate\Http\Request;

class CoinCardApiController extends Controller
{

    protected $repository;

    public function __construct(CoinCardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * api returns the number of coins of the existing user.
     *
     * @param  int $id
     * @return \App\Http\Resources\CoinCardResource
     */
    public function show($id)
    {
        $coin_card = $this->repository->show($id);
        return new CoinCardResource($coin_card);
    }

    /**
     * api refunds user coins used when order payment is refunded.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\App\Http\Resources\CoinCardResource
     */
    public function refund(Request $request)
    {

        $user_id = $request->user_id;
        $coin_card = $this->repository->show($user_id);

        if ($coin_card) {
            $user_coin = $coin_card->coin + $request->coin;

            $this->repository->update($user_id, $user_coin);

            $coin_card = $this->repository->show($user_id);

            return new CoinCardResource($coin_card);
        } else {
            return response()->json(
                [
                    'error' => "user not exit",
                ]
            );
        }
    }
}