<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Voucher;

class ChartController extends Controller
{
    public function index()
    {
        $voucher = Voucher::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw(" Month(created_at)"))
                    ->pluck('count', 'month_name');
        $labels = $voucher->keys();
        $data = $voucher->values();
        return view('dashboard.dashboard', compact('labels', 'data'));
    }
}
