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
        $users = Voucher::select(DB::raw("SUM(quantium) as count"), DB::raw("EXTRACT(day FROM created_at) as day_name"))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("EXTRACT(DAY FROM created_at)"))
            ->pluck('count', 'day_name');
        $labels = $users->keys();
        $data = $users->values();

        $count = Voucher::select(DB::raw("type"), DB::raw("SUM(total) as total"), DB::raw("(SUM(total) - SUM(quantium)) as used"))
        ->groupBy(DB::RAW("type"))
        ->get();
        $result[] = ['Type','Created','Used'];
        foreach ($count as $key => $value) {
            if($value -> type == 1){
            $result[1] = ["Freeship", (int)$value->total, (int)$value->used];}
            elseif($value -> type == 2){
            $result[2] = ["Price discount", (int)$value->total, (int)$value->used];}
            elseif($value -> type == 3){
            $result[3] = ["Percent discount", (int)$value->total, (int)$value->used];}
        }

        $freeship = \App\Models\Freeship::count();
        $percent = \App\Models\PercentDiscount::count();
        $price = \App\Models\PriceDiscount::count();
        return view('dashboards.admins.index',compact('labels', 'data','result','freeship','percent','price'));
    }

}
