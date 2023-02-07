<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display dashboard of admin
     */

    public function index(){
        return view(
            'dashboards.admins.index');
    }
}
