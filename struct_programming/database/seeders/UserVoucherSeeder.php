<?php

namespace Database\Seeders;

use App\Models\UserVoucher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserVoucher::insert([
            ['user_id' => 1, 'voucher_id' => 1],
            ['user_id' => 2, 'voucher_id' => 1],
            ['user_id' => 3, 'voucher_id' => 1],
            ['user_id' => 4, 'voucher_id' => 1],
            ['user_id' => 5, 'voucher_id' => 1],
            ['user_id' => 1, 'voucher_id' => 3],
            ['user_id' => 2, 'voucher_id' => 3],
            ['user_id' => 3, 'voucher_id' => 3],
            ['user_id' => 4, 'voucher_id' => 3],
            ['user_id' => 5, 'voucher_id' => 3],
            ['user_id' => 1, 'voucher_id' => 5],
            ['user_id' => 2, 'voucher_id' => 5],
            ['user_id' => 3, 'voucher_id' => 5],
            ['user_id' => 4, 'voucher_id' => 5],
            ['user_id' => 5, 'voucher_id' => 5],
        ]);
    }
}
