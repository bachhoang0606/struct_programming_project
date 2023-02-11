<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */

    public function index()
    {
        //get the number of vouchers generated on the days of the month
        $voucher = Voucher::select(DB::raw("SUM(total) as count"), DB::raw("EXTRACT(day FROM created_at) as day_name"))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("EXTRACT(DAY FROM created_at)"))
            ->pluck('count', 'day_name');
        $labels = $voucher->keys();
        $data = $voucher->values();

        //get the number of vouchers created and used of the voucher types
        $count = Voucher::select(DB::raw("type"), DB::raw("SUM(total) as total"), DB::raw("(SUM(total) - SUM(quantium)) as used"))
        ->groupBy(DB::RAW("type"))
        ->get();
        $result[] = ['Type','Created','Used'];
        foreach ($count as $key => $value) {
            // $result[++$key] = [$value->type, (int)$value->total1, (int)$value->used];
            if($value -> type == 1){
            $result[++$key] = ["Freeship", (int)$value->total, (int)$value->used];}
            elseif($value -> type == 2){
            $result[++$key] = ["Price discount", (int)$value->total, (int)$value->used];}
            elseif($value -> type == 3){
            $result[++$key] = ["Percent discount", (int)$value->total, (int)$value->used];}
        }

        //get the number of vouchers
        $freeship = \App\Models\Freeship::count();
        $percent = \App\Models\PercentDiscount::count();
        $price = \App\Models\PriceDiscount::count();
        return view('dashboards.admins.index',compact('labels', 'data','result','freeship','percent','price'));
    }

}
