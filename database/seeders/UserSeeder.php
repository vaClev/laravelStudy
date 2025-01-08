<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
        DB::table('users')->insert([
            'name'=>"Tester".$i,
            "email"=> $i."@mail.ru",
            "password"=> md5($i."23")
        ]);
    }
    }
}
