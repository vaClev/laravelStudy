<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++){
           DB::table('comments')->insert([
                'text' => Str::random(100),
                'user_id' => rand(1, 10),
                // 'news_id' => 
                'path_image' => 'images/images.jpg'
            ]); 
        }
        
    }
}
