<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->realText(10, 5),
            'price' => fake()->numberBetween(100, 30000),
            'vendor_id' => fake()->numberBetween(1, 5),
            'wattage_id' => fake()->numberBetween(1, 5),
            'type_id' => fake()->numberBetween(1, 5),
        ];
    }
}
