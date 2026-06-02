<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends Factory<Model>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3), 
            'author' => fake()->name(),
            'isbn' => fake()->isbn13(), 
            'description' => fake()->paragraph(), 
            'published_year' => fake()->numberBetween(1950, 2026), 
            'page_count' => fake()->numberBetween(100, 850), 
            'genre' => fake()->randomElement(['Fiction', 'Mystery', 'Sci-Fi', 'Biography', 'Fantasy']), 
        ];
    }
}
