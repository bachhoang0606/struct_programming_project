<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display dashboard of admin
     */

    public function index()
    {
        $users = Voucher::select(DB::raw("SUM(quantium) as count"), DB::raw("EXTRACT(day FROM created_at) as day_name"))
            ->whereMonth('created_at', date('m'))
            ->groupBy(DB::raw("EXTRACT(DAY FROM created_at)"))
            ->pluck('count', 'day_name');
        $labels = $users->keys();
        $data = $users->values();
        return view('dashboards.admins.index',compact('labels', 'data'));
    }

}
