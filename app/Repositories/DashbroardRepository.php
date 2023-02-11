<?php
namespace App\Repositories;

use App\Contracts\Repositories\DashbroardRepositoryInterface;
use App\Models\Freeship;
use App\Models\PercentDiscount;
use App\Models\PriceDiscount;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;


class DashbroardRepository extends VoucherRepository implements DashbroardRepositoryInterface
{
    //get the number of vouchers type
    public function freeshipCount(){
        $count = Freeship::count();
        return $count;
    }

    public function percentDiscountCount(){
        $count = PercentDiscount::count();
        return $count;
    }

    public function priceDiscountCount(){
        $count = PriceDiscount::count();
        return $count;
    }
    //get the number of vouchers generated on the days of the month
    public function voucherCreatedInMonth(){
        $users =  Voucher::select(DB::raw("SUM(total) as count"), DB::raw("EXTRACT(day FROM created_at) as day_name"))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("EXTRACT(DAY FROM created_at)"))
            ->pluck('count', 'day_name');
        return $users;
    }
    //get the number of vouchers created and used of the voucher types
    public function getTotalUsed(){
        $count =  Voucher::select(DB::raw("type"), DB::raw("SUM(total) as total"), DB::raw("(SUM(total) - SUM(quantium)) as used"))
        ->groupBy(DB::RAW("type"))
        ->get();
        return $count;
    }
}