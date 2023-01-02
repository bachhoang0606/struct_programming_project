<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ProductAttribute::insert([
            ['product_id' => 1, 'name' => 'Ao phong', 'coin' => '10000', 'discount' => '20'],
            ['product_id' => 2, 'name' => 'Ao phong', 'coin' => '10000', 'discount' => '20'],
            ['product_id' => 3, 'name' => 'Ao phong', 'coin' => '10000', 'discount' => '20'],
            ['product_id' => 4, 'name' => 'Ao phong', 'coin' => '10000', 'discount' => '20'],
            ['product_id' => 5, 'name' => 'Ao phong', 'coin' => '10000', 'discount' => '20'],
        ]);
    }
}
