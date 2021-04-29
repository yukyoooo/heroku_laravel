<?php

namespace Database\Factories;

use App\Models\bookApp;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SlideFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = bookApp::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images = [
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/Vj3kwNCiBEGIM5HhVDfEAeUpzjZpYP1cFcafqJzB.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/InIcjiwokwvtmvF0zT9Oji8XeJyCPvN7tb2EOfXN.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/pPm5tSxnx6ZmwyvUI5vRTDyMUtBlDnZGJ9vdzGJr.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/juUyxs66akKElrAOOIAiLWACpnYllP8Cx0rA0GGv.jpg',
        ];
        return [
            'book_title' => Str::random(10),
            'book_detail' => Str::random(300),
            'user_id' => $this->faker->numberBetween($min = 1, $max=3),
            'image_path' => $images[$this->faker->numberBetween($min = 0, $max=3)],
        ];
    }
}
