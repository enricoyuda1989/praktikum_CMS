<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Supplier;

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
        'category_id' => rand(1, 5),
        'supplier_id' => Supplier::inRandomOrder()->first()?->id ?? Supplier::factory(), // fallback
        'name' => $this->faker->words(2, true),
        'stock' => $this->faker->numberBetween(0, 100),
        'price' => $this->faker->randomFloat(2, 10000, 1000000),
        'description' => $this->faker->sentence(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
}
}
