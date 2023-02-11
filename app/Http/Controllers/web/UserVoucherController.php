<?php

namespace App\Http\Controllers\web;

use App\Contracts\Repositories\UserVoucherRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserVoucherResource;
use App\Models\CoinCard;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\Voucher;

class UserVoucherController extends Controller
{

    protected $repository;
    public function __construct(UserVoucherRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource belong to user by id.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function displayAll($id)
    {
        $vouchers = $this->repository->indexVouchers();
        $freeships = $this->repository->indexFreeships();
        $price_discounts = $this->repository->indexPriceDiscounts();
        $percent_discounts = $this->repository->indexPercentDiscounts();
        $data = new UserVoucherResource($this->repository->showCoinCard($id));

        return view(
            "user_vouchers.users.all",
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

    /**
     * Display a listing of the resource freeships vouchers belong to user by id.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function displayFreeships($id)
    {
        $freeships = $this->repository->indexFreeships();
        $vouchers = $this->repository->indexVouchers();
        $data = new UserVoucherResource($this->repository->showCoinCard($id));

        return view(
            "user_vouchers.users.freeships",
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

    /**
     * Display a listing of the resource percent vouchers belong to user by id.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function displayPercent($id)
    {
        $percent_discounts = $this->repository->indexPercentDiscounts();
        $vouchers = $this->repository->indexVouchers();
        $data = new UserVoucherResource($this->repository->showCoinCard($id));

        return view(
            "user_vouchers.users.percent",
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

    /**
     * Display a listing of the resource price vouchers belong to user by id.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory
     */
    public function displayPrice($id)
    {
        $price_discounts = $this->repository->indexPriceDiscounts();
        $vouchers = $this->repository->indexVouchers();
        $data = new UserVoucherResource($this->repository->showCoinCard($id));

        return view(
            "user_vouchers.users.price",
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

}