<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\News;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();


        News::factory(100)->create();

        $this->call([
            CommentsSeeder::class,
            ProductsCategoriesSeeder::class,
            ProductsSeeder::class,
            UserSeeder::class,
            CartSeeder::class,
        ]);

    }
}
