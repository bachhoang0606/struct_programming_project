<?php
namespace App\Repositories;

use App\Contracts\Repositories\UserVoucherRepositoryInterface;
use App\Models\CoinCard;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;


class UserVoucherRepository implements UserVoucherRepositoryInterface
{
    public function index()
    {
        $users_vouchers = UserVoucher::all();
        return $users_vouchers;
    }

    public function show($id)
    {
        $user_vouchers = UserVoucher::where('user_id', $id);
        return $user_vouchers;
    }

    public function destroy($id)
    {

    }

    public function store($attributes)
    {

        $user_voucher = UserVoucher::create($attributes->all());
        return $user_voucher;
    }
    public function update($id, $update_array)
    {
    }
    public function checkVoucherExit($id)
    {
        $voucher = Voucher::find($id);
        return $voucher;
    }
    public function checkUserHasVoucher($user_id, $voucher_id)
    {

        $row = UserVoucher::where("user_id", $user_id)
            ->where("voucher_id", $voucher_id)
            ->first();
        return $row;
    }

    public function indexCoinCards()
    {
        $coin_cards = CoinCard::all();
        return $coin_cards;
    }

    public function showCoinCard($id)
    {
        $coin_card = CoinCard::find($id);
        return $coin_card;
    }

    public function indexVouchers(){
        $vouchers = Voucher::all();
        return $vouchers;
    }
    public function indexFreeships()
    {
        $freeships = Freeship::all();
        return $freeships;
    }
    public function indexPriceDiscounts()
    {
        $price_discounts = PriceDiscount::all();
        return $price_discounts;
    }
    public function indexPercentDiscounts()
    {
        $percent_discounts = PercentDiscount::all();
        return $percent_discounts;
    }
}