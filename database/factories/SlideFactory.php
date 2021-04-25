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
        return [
            'book_title' => Str::random(10),
            'book_detail' => Str::random(300),
            'user_id' => $this->faker->numberBetween($min = 1, $max=3),
        ];
    }
}
