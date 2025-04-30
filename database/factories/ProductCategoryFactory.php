<?php

namespace Database\Factories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductCategoryFactory extends Factory
{
    protected $model = ProductCategory::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->words(3, true),
            'parent_id' => null,
            'created_at' => now(),
            'updated_at' => now()
        ];
    }

    public function withParent(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => ProductCategory::factory()
            ];
        });
    }
}
