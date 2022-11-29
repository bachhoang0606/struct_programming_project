<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('vouchers')->insert([
            ['title' => 'voucher giam gia freeship', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
            ['title' => 'voucher giam gia freeship2', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
            ['title' => 'voucher giam gia percent discounts', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
            ['title' => 'voucher giam gia percent discounts2', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
            ['title' => 'voucher giam gia price discounts', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
            ['title' => 'voucher giam gia price discounts 2', 'content' => Str::random(40), 'minimun_price' => '12000', 'quantium' => '100', 'outdate_at' => date('Y-m-d')],
        ]);

        DB::table('freeships')->insert([
            ['voucher_id' => '1' , 'price' => '12000'],
            ['voucher_id' => '2' , 'price' => '12000'],
        ]);

        DB::table('percent_discounts')->insert([
            ['voucher_id' => '3', 'percent' => '50', 'max_price' => '500000'],
            ['voucher_id' => '4', 'percent' => '50', 'max_price' => '500000'],
        ]);

        DB::table('price_discounts')->insert([
            ['voucher_id' => '5' , 'price' => '12000'],
            ['voucher_id' => '6' , 'price' => '12000'],
        ]);
    }
}
