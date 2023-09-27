<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 5, 60),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Book $book) {
            $book->authors()
                ->attach(Author::query()->inRandomOrder()->take(rand(0, 3))->pluck('id'));
        });
    }
}
