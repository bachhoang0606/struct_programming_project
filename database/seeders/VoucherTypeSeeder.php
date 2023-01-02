<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoucherTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Voucher::where('id', 1)->update(['type' => 1]);
        Voucher::where('id', 2)->update(['type' => 1]);
        Voucher::where('id', 3)->update(['type' => 3]);
        Voucher::where('id', 4)->update(['type' => 3]);
        Voucher::where('id', 5)->update(['type' => 2]);
        Voucher::where('id', 6)->update(['type' => 2]);
    }
}
