<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'created_at' => $this->faker->date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s', 'now'),
            'name' => $this->faker->name,
            'comment' => $this->faker->realText(200),
            'book_app_id' => $this->faker->numberBetween($min = 1, $max=30),
        ];
    }
}
