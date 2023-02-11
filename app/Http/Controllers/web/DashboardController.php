<?php

namespace App\Http\Controllers\web;

use App\Contracts\Repositories\DashbroardRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $repository;

    public function __construct(DashbroardRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * Display dashbroard.
     *
     * @return \Illuminate\Contracts\View\Factory
     */

    public function index()
    {

        $voucher = $this->repository->voucherCreatedInMonth();
        $labels = $users->keys();
        $data = $users->values();

        $count = $this->repository->getTotalUsed();
        $result[] = ['Type', 'Created', 'Used'];
        foreach ($count as $key => $value) {
            // $result[++$key] = [$value->type, (int)$value->total1, (int)$value->used];
            if ($value->type == 1) {
                $result[++$key] = ["Freeship", (int) $value->total, (int) $value->used];
            } elseif ($value->type == 2) {
                $result[++$key] = ["Price discount", (int) $value->total, (int) $value->used];
            } elseif ($value->type == 3) {
                $result[++$key] = ["Percent discount", (int) $value->total, (int) $value->used];
            }
        }


        $freeship = $this->repository->freeshipCount();
        $percent = $this->repository->percentDiscountCount();
        $price = $this->repository->priceDiscountCount();
        return view('dashboards.admins.index', compact('labels', 'data', 'result', 'freeship', 'percent', 'price'));
    }

}