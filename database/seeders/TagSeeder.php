<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            ['name' => 'ビジネス'],
            ['name' => '小説/エッセイ'],
            ['name' => '実用書']
        ]);
    }
}
