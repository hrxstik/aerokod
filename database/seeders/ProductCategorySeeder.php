<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::factory()->count(10)->create();

        foreach (ProductCategory::all() as $category) {
            ProductCategory::factory()->count(3)->for($category, 'parent')->create();
        }
    }
}
