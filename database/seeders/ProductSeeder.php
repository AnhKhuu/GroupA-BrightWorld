<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => Str::random(2).'Product_Name',
            'unit' => 'VND',
            'price' => 500,
            'img_url' => Str::random(2).'Product_IMG_URL',
            'description' => Str::random(2).'Product_Desc',
            'sold' => 5,
            'in_stock' => 20,
            'watt_id' => 1,
            'type_id' => 1,
            'shape_id' => 1,
            'sale_id' => 1,
            'brand_id' => 1,
            'country_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
