<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        [
            'comment' => '山手線',
        ],
        [
            'comment' => '京浜東北線',
        ],
        [
            'comment' => '東武東上線',
        ],
    }
}
