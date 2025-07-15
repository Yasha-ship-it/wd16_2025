<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_infos')->insert([
            'user_id' => 1,
            'age' => 0,
            'desc' => 'desc'
        ]);
        DB::table('user_infos')->insert([
            'user_id' => 2,
            'age' => 21,
            'desc' => 'desc'
        ]);
    }
}
