<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($user_id = 1; $user_id <= 10; $user_id++){ //по 10 юзерам
            for ($product = 0; $product < 3; $product++){ //каждому три товара
                DB::table('cart')->insert([
                    "user_id"=> $user_id,
                    "product_id"=>rand(1,6),
                    "quantity"=> rand(1,10)
                ]);
            }
        }
    }
}
