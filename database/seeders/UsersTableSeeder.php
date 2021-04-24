<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'introduction' => Str::random(10),
                'favorite_book' => Str::random(10),
                'favorite_book2' => Str::random(10),
                'favorite_book3' => Str::random(10),
                'password' => Hash::make('password'),
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'introduction' => Str::random(10),
                'favorite_book' => Str::random(10),
                'favorite_book2' => Str::random(10),
                'favorite_book3' => Str::random(10),
                'password' => Hash::make('password'),
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'introduction' => Str::random(10),
                'favorite_book' => Str::random(10),
                'favorite_book2' => Str::random(10),
                'favorite_book3' => Str::random(10),
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
