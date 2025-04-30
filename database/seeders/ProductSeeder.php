<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        foreach (ProductCategory::all() as $category) {
            Product::factory()->count(5)->create(['category_id' => $category->id]);
        }

    }
}
