<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_comment')->insert([
            [
                'route_id' => 1,
                'shop_id' => 1,
            ],
            [
                'route_id' => 1,
                'shop_id' => 2,
            ],
            [
                'route_id' => 2,
                'shop_id' => 1,
            ],
        ]);
    }
}
