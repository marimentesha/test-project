<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<post>
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
            'title' => fake()->sentence(5),
            'description' => fake()->sentence(20),
            'image' => 'posts/' . basename(fake()->imageUrl(category: 'post')),
            'author_id' => Author::inRandomOrder()->first()->id,
        ];
    }
}
