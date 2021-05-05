<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => Str::random(10).'@gmail.com',
            'introduction' => $this->faker->realText(200),
            'favorite_book' => $this->faker->realText(10),
            'favorite_book2' => $this->faker->realText(10),
            'favorite_book3' => $this->faker->realText(10),
            'password' => Hash::make('password'),
        ];
    }
}
