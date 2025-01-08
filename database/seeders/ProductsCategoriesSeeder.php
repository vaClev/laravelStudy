<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::insert('insert into products_categories (name) values (?), (?), (?);',
         ['Детские товары', 'Техника', 'Одежда']);

        for($i = 0; $i < 3; $i++){
            DB::table('products_categories')->insert([
                 'name' => Str::random(10),
             ]); 
         }
    }
}
