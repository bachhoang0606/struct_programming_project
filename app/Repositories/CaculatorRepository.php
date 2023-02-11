<?php
namespace App\Repositories;

use App\Contracts\Repositories\CaculatorRepositoryInterface;
use App\Models\CoinCard;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;

class CaculatorRepository implements CaculatorRepositoryInterface
{
    public function userVoucher($user_id, $voucher_id)
    {
        $user_voucher = UserVoucher::where('user_id', $user_id)
            ->where('voucher_id', $voucher_id)
            ->first();

        return $user_voucher;
    }
    public function showVoucher($id)
    {
        $voucher = Voucher::find($id);
        return $voucher;
    }

    public function showFreeship($id)
    {
        $freeship = Freeship::where('voucher_id', $id)
            ->first();
        return $freeship;
    }
    public function showPriceDiscount($id)
    {
        $price_discount = PriceDiscount::where('voucher_id', $id)
            ->first();
        return $price_discount;
    }
    public function showPercentDiscount($id)
    {
        $percent_discount = PercentDiscount::where('voucher_id', $id)
            ->first();
        return $percent_discount;
    }
    public function coinCard($id)
    {
        $coin_card = CoinCard::where('user_id', $id)
            ->first();
        return $coin_card;
    }
    public function coinCardUpdate($id, $attribute)
    {
        $coin_card = CoinCard::where('user_id', $id)
            ->update($attribute);
        return $coin_card;
    }
}