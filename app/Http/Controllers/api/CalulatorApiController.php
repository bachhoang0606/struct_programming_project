<?php

namespace App\Http\Controllers\api;

use App\Contracts\Repositories\CaculatorRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalulatorApiController extends Controller
{
    protected $repository;

    public function __construct(CaculatorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    /**
     * api supports calculation of order value to be reduced at checkout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function payment(Request $request)
    {
        $discount_price = 0;
        $user_id = $request->user_id;
        $voucher_id = $request->voucher_id;
        if ($request->voucher_id) {
            // kiem tra nguoi dung co voucher chon khong
            $user_voucher = $this->repository->userVoucher($user_id, $voucher_id);

            // dd($user_voucher);
            if ($user_voucher == null) {
                return response()->json(
                    [
                        'error' => 'Nguoi dung khong co voucher nay'
                    ]
                );
            }

            // kiem tra gia tri don hang toi thieu
            $voucher = $this->repository->showVoucher($voucher_id);

            // Tong so tien san pham
            $total = $request->shipping_fee + $request->product_price;

            if ($voucher->minimun_price > $total) {
                return response()->json(
                    [
                        'error' => 'Gia tri toi thieu khong thoa man'
                    ]
                );
            }

            // tinh so tien duoc tru khi dung voucher
            if ($voucher->type == 1) {
                // neu la freeship

                $voucher = $this->repository->showFreeship($voucher_id);

                $discount_price = $voucher->price;

                // neu so tien giam gia tren voucher lon hon so tien ship thuc te thi so tien duoc
                // giam bang so tien ship thuc te

                if ($discount_price > $request->shipping_fee) {
                    $discount_price = $request->shipping_fee;
                }

            } elseif ($voucher->type == 2) {
                // neu la giam gia co dinh
                $voucher = $this->repository->showPriceDiscount($voucher_id);

                $discount_price = $voucher->price;

            } else {
                // neu giam gia theo phan tram
                $voucher = $this->repository->showPercentDiscount($voucher_id);

                $discount_price = $request->product_price * $voucher->percent / 100;

                if ($discount_price > $voucher->max_price) {
                    // neu so tien duoc giam lon hon so tien toi da duoc giam thi so tien duoc
                    // giam bang so tien toi da duoc giam
                    $discount_price = $voucher->max_price;
                }
            }
            // xoa voucher ra khoi bang voucher nguoi dung
            $user_voucher = $this->repository->userVoucher($user_id, $voucher_id);
        }



        // tinh toan so tien duoc tru khi dung diem
        $discount_price += $request->coin;

        // cap nhat lai xu cua nguoi dung
        $user = $this->repository->coinCard($user_id);

        $user_coin = $user->coin - $request->coin;
        if ($user_coin < 0) {

            return response()->json(
                [
                    'error' => 'Nguoi dung khong du diem'
                ]
            );
        }
        $user = $this->repository->coinCardUpdate(
            $user_id,
            [
                'coin' => $user_coin
            ]
        );
        return response()->json(
            [
                'data' => [
                    'produc_discount' => $discount_price,
                ]
            ]
        );
    }
}