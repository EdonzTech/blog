<?php

namespace Database\Factories;

use App\Models\Publisher;
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
        return [
            //
            'publisher_id' => Publisher::factory(),
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
           'image' => 'https://picsum.photos/800/600?random=' . $this->faker->unique()->numberBetween(1, 1000)

        ];
    }
}
