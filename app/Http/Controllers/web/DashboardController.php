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
        //get the number of vouchers generated on the days of the month
        $voucher = $this->repository->voucherCreatedInMonth();
        $labels = $voucher->keys();
        $data = $voucher->values();

        //get the number of vouchers created and used of the voucher types
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

        //get the number of vouchers
        $freeship = $this->repository->freeshipCount();
        $percent = $this->repository->percentDiscountCount();
        $price = $this->repository->priceDiscountCount();
        return view('dashboards.admins.index', compact('labels', 'data', 'result', 'freeship', 'percent', 'price'));
    }


    /**
     * Display a listing and chart of the freeship
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function freeship()
    {

        //get the number of vouchers created and used
        $freeships = $this->repository->indexFreeship();
        $result[] = ['Id', 'Created', 'Used'];
        foreach ($freeships as $key => $freeship) {
            // $result[++$key] = [$value->type, (int)$value->total1, (int)$value->used];
            $result[++$key] = [$freeship->voucher_id, $freeship->voucher->total, $freeship->voucher->total - $freeship->voucher->quantium];
        }

        return view(
            "dashboards.admins.freeship", 
            compact('result', 'freeships')
        );
    }

    /**
     * Display a listing and chart of the price discount
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function priceDiscount()
    {
        //get the number of vouchers created
        $price_discounts = $this->repository->indexPriceDiscount();
        $result[] = ['Id', 'Created', 'Used'];
        foreach ($price_discounts as $key => $price_discount) {
            // $result[++$key] = [$value->type, (int)$value->total1, (int)$value->used];
            $result[++$key] = [$price_discount->voucher_id, $price_discount->voucher->total, $price_discount->voucher->total - $price_discount->voucher->quantium];
        }

        return view(
            "dashboards.admins.price_discount", 
            compact('result', 'price_discounts')
        );
    }
    

    /**
     * Display a listing and chart of the percent discount
     * 
     * @return \Illuminate\Contracts\View\Factory
     */
    public function percentDiscount()
    {
        //get the number of vouchers created and used
        $percent_discounts = $this->repository->indexPercentDiscount();
        $result[] = ['Id', 'Created', 'Used'];
        foreach ($percent_discounts as $key => $percent_discount) {
            // $result[++$key] = [$value->type, (int)$value->total1, (int)$value->used];
            $result[++$key] = [$percent_discount->voucher_id, $percent_discount->voucher->total, $percent_discount->voucher->total - $percent_discount->voucher->quantium];
        }

        return view(
            "dashboards.admins.percent_discount", 
            compact('result', 'percent_discounts')
        );
    }
}
