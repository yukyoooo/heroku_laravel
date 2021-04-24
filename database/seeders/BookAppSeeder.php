<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slide;


class BookAppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slide::factory()->count(200)->create();

    }
}
