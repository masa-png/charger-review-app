<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText(10, 5),
            'content' => fake()->realText(30, 2),
            'score' => fake()->numberBetween(1, 5),
            'product_id' => Product::factory(),
            'user_id' => 1,
        ];
    }
}
