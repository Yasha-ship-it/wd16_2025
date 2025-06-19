<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class News extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            'title' => 'test',
            'description' => 'desc'
        ]);
        DB::table('news')->insert([
            'title' => 'test1',
            'description' => 'desc2'
        ]);
    }
}
