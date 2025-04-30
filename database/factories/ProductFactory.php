<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'category_id' => ProductCategory::factory(),
            'created_at' => now(),
            'updated_at' => now()
        ];
    }
}
