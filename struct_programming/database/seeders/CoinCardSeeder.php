<?php

namespace Database\Seeders;

use App\Models\CoinCard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class CoinCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CoinCard::insert([
            ['user_id' => 1, 'name' => 'Hoang XB', 'phone' => '10026060123', 'email' => '1@gmail.com', 'coin' => rand(0, 1000000)],
            ['user_id' => 2, 'name' => 'Hoang XB', 'phone' => '10026060123', 'email' => '2@gmail.com', 'coin' => rand(0, 1000000)],
            ['user_id' => 3, 'name' => 'Hoang XB', 'phone' => '10026060123', 'email' => '3@gmail.com', 'coin' => rand(0, 1000000)],
            ['user_id' => 4, 'name' => 'Hoang XB', 'phone' => '10026060123', 'email' => '4@gmail.com', 'coin' => rand(0, 1000000)],
            ['user_id' => 5, 'name' => 'Hoang XB', 'phone' => '10026060123', 'email' => '6@gmail.com', 'coin' => rand(0, 1000000)],
        ]);
    }
}
