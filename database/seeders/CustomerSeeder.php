<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => Str::random(2).'Customer-First-Name',
            'last_name' => Str::random(2).'Customer-Last-Name',
            'phone_number' => Str::random(2).'91991988',
            'address' => Str::random(2).'Customer-Address',
            'zip' => 100000,
            'email' => Str::random(10).'@gmail.com',
            'user_name' => Str::random(2).'CustomerUserName',
            'password' => 123456,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
