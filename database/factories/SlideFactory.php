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
        ];
    }
}
