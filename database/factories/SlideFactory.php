<?php

namespace Database\Factories;

use App\Models\bookApp;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $slides= [
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/ajzES3raQEwZyBecmmMZgYucPrFXISX7lGsDl9AL.pdf',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/HlWqA08fktc7n5qv5eMfGMVAeBy4F03mWSkaNFVn.pdf',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/Pi459GIqtbx1EaBxpYlZAAJy9s93wwOf4uVtMOD9.pdf',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/rUGiPaPjEsOnrOJpUeCQfDSMbYqmBKCq9XUcQQd8.pdf',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/ScJZm34WPcSKIhZKQqjycufCA1pWcgRCQoidgvAy.pdf',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/slides2021-05-08/4rSi1MRDt6xuTMV2dGokMKL30eJKFVh8eND8Nv2a.pdf',
        ];
        $images = [
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/InIcjiwokwvtmvF0zT9Oji8XeJyCPvN7tb2EOfXN.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/pPm5tSxnx6ZmwyvUI5vRTDyMUtBlDnZGJ9vdzGJr.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/2uHCJjUiY9AXp9anrxAzYE3NmveS9P6iBE7EzNv7.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/3vug2VYKGnDqN4996RPLNZDnok7SZvXP0QDnpww3.jpg',
            'https://s3-ap-northeast-1.amazonaws.com/my-app-s3-yukyo/bookapp/bookimg/4dnX7KExk8akKP7IZE1fBTEWIPqZC9JqVZ1qh9XF.jpg',
        ];
        return [
            'book_title' => $this->faker->realText(10),
            'book_detail' => $this->faker->realText(200),
            'user_id' => $this->faker->numberBetween($min = 1, $max=10),
            'image_path' => $images[$this->faker->numberBetween($min = 0, $max=4)],
            'slides_path' => $slides[$this->faker->numberBetween($min = 0, $max=5)],
        ];
    }
}
