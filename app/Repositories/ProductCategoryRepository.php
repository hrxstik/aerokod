<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Collection;

class ProductCategoryRepository
{
    public function getAll(): Collection
    {
        return ProductCategory::with('children')->whereNull('parent_id')->get();
    }

    public function find(int $id): ?ProductCategory
    {
        return ProductCategory::find($id);
    }

    public function create(array $data): ProductCategory
    {
        return ProductCategory::create($data);
    }

    public function update(ProductCategory $category, array $data): bool
    {
        return $category->update($data);
    }

    public function delete(ProductCategory $category): bool
    {
        return $category->delete();
    }
    public function restore(int $id): bool
    {
        return ProductCategory::withTrashed()->findOrFail($id)->restore();
    }

    public function forceDelete(int $id): bool
    {
        return ProductCategory::withTrashed()->findOrFail($id)->forceDelete();
    }
}
