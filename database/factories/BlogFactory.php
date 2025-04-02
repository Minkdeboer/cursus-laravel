<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => '/uploads/image.png',
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(3),  
            'author_id' => fake()->numberBetween(1, 20),
        ];
    }
}
