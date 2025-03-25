<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
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
            'cover_path'=> $this->faker->imageUrl(200, 300, 'books', true), 
            'title'=> $this->faker->sentence(3), 
            'author'=> $this->faker->name(),
            'genres'=> $this->faker->randomElement(['Horror', 'Fantasy', 'Romance', 'Action']),
            'total_pages'=> $this->faker->numberBetween(100,300),
            'first_publish'=> $this->faker->date(), 
            'synopsis'=> $this->faker->paragraph(),
        ];
    }
}
