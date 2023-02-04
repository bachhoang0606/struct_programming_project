<?php
namespace App\Repositories;

use App\Contracts\Repositories\VoucherRepositoryInterface;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\UserVoucher;
use App\Models\Voucher;


class VoucherRepository implements VoucherRepositoryInterface
{
    public function index()
    {
        $vouchers = Voucher::all();
        return $vouchers;
    }

    public function show($id)
    {
        $voucher = Voucher::where('id', $id)->first();
        return $voucher;
    }

    public function store($attributes)
    {

        $voucher = Voucher::create(
            $attributes->only(
                [
                    'title',
                    'content',
                    'minimun_price',
                    'quantium',
                    'expiration_date',
                    'effective_date',
                ]
            )
        );

        $type = $attributes->Vtype;
        $id = $voucher->id;

        if ($type == 'freeships') {
            // store freeship voucher
            Voucher::where('id', $id)->update(
                [
                    'type' => 1
                ]
            );

            Freeship::create([

                'voucher_id' => $id,
                'price' => $attributes->price,
            ]);
        } elseif ($type == 'priceDiscounts') {
            // store price discounts voucher
            Voucher::where('id', $id)->update(

                [
                    'type' => 2
                ]
            );
            PriceDiscount::create(
                [
                    'voucher_id' => $id,
                    'price' => $attributes->price
                ]
            );
        } else {
            // store percent discounts voucher
            Voucher::where('id', $id)->update(
                [
                    'type' => 3
                ]
            );
            PercentDiscount::create([
                'voucher_id' => $id,
                'percent' => $attributes->percent,
                'max_price' => $attributes->max_price,
            ]);
        }

        return $voucher;
    }

    public function destroy($id)
    {
        $voucher = Voucher::find($id);
        if ($voucher->type == 1) {

            // delete voucher freeship
            Freeship::where('voucher_id', $id)->delete();
        } elseif ($voucher->type == 2) {

            // delete voucher price discounts
            PriceDiscount::where('voucher_id', $id)->delete();
        } else {

            // delete voucher percent discounts
            PercentDiscount::where('voucher_id', $id)->delete();
        }

        // delete voucher with id
        UserVoucher::where('voucher_id', $id)
            ->delete();
        $voucher->delete();
    }

    public function update($id, $update_array)
    {
        $attributes = $update_array->only(
            [
                'title',
                'content',
                'minimun_price',
                'quantium',
                'expiration_date',
                'effective_date'
            ]
        );

        Voucher::where('id', $id)->update($attributes);

        $type = $update_array->Vtype;

        if ($type == 'freeships') {
            // update freeship voucher
            Voucher::where('id', $id)
                ->update(
                    [
                        'type' => 1
                    ]
                );

            Freeship::where('voucher_id', $id)
                ->update(
                    [
                        'price' => $update_array->price,
                    ]
                );

        } elseif ($type == 'priceDiscounts') {
            // update price discounts voucher
            Voucher::where('id', $id)
                ->update(
                    [
                        'type' => 2
                    ]
                );

            PriceDiscount::where('voucher_id', $id)
                ->update(
                    [
                        'price' => $update_array->price
                    ]
                );
        } else {
            // update percent discounts voucher
            Voucher::where('id', $id)
                ->update(
                    [
                        'type' => 3
                    ]
                );
            PercentDiscount::where('voucher_id', $id)
                ->update(
                    [
                        'percent' => $update_array->percent,
                        'max_price' => $update_array->max_price
                    ]
                );
        }
    }

    public function indexFreeship()
    {
        $freeships = Freeship::all();
        return $freeships;
    }
    public function indexPriceDiscount()
    {
        $price_discounts = PriceDiscount::all();
        return $price_discounts;
    }
    public function indexPercentDiscount()
    {
        $percent_discounts = PercentDiscount::all();
        return $percent_discounts;
    }
}