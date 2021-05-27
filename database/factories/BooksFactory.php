<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

class BooksFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Books::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'book_title' => $this->faker->realText(20),
            'book_description' => $this->faker->text(),
            'book_price' => rand(2200,5000),
            'book_quantity' => rand(1,20),
            'author_id' => rand(1,50),

        ];
    }
}
