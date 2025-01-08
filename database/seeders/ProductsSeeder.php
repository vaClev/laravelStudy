<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 6; $i++) {
        DB::table('products')->insert([
            'name' => $i."товарчик ".Str::random(10),
            'category_id' =>rand(1, 5),
            'price'=> rand(100, 5000),
            'discount'=>rand(0, 30) , 
            'rating'=> rand(10,50)/100,
            'description'=> Str::random(50),
            'path_image'=> "images/".$i.".webp",
        ]); 
    }
    }
}
