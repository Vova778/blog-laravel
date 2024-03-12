<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $createdAt = $this->faker->dateTimeBetween('-2 months', 'now');

        return [
            'title' => $this->faker->text(15, 70),
            'content' => $this->faker->sentence(mt_rand(220,360), true),
            'image' => 'fakeImages\Image_test.png',
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
