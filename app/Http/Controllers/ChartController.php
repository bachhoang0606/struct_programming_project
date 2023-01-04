<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
class ChartController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))

                    ->whereYear('created_at', date('Y'))

                    ->groupBy(DB::raw(" Month(created_at)"))

                    ->pluck('count', 'month_name');
        $labels = $users->keys();
        $data = $users->values();
        return view('chart', compact('labels', 'data'));
    }
}
