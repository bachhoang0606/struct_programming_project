<?php
namespace App\Contracts\Repositories;

interface UserVoucherRepositoryInterface extends AbstractRepositoryInterface
{
    public function checkVoucherExit($id);
    public function checkUserHasVoucher($user_id, $voucher_id);
    public function indexCoinCards();
    public function showCoinCard($id);
    public function indexVouchers();
    public function indexFreeships();
    public function indexPriceDiscounts();
    public function indexPercentDiscounts();
}