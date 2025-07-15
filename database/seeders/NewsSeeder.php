<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('news')->insert([
                'title' => 'news_test_' . $i,
                'desc' => 'desc_' . $i,
                'description' => 'description_' . $i
            ]);
        }
    }
}
