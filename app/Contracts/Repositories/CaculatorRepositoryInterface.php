<?php
namespace App\Contracts\Repositories;


interface CaculatorRepositoryInterface
{

    public function userVoucher($user_id, $voucher_id);
    public function showVoucher($id);
    public function showFreeship($id);
    public function showPriceDiscount($id);
    public function showPercentDiscount($id);
    public function coinCard($id);
    public function coinCardUpdate($id, $attribute);
}