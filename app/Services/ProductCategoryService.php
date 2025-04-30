<?php

namespace App\Services;

use App\Repositories\ProductCategoryRepository;
use App\Models\ProductCategory;

class ProductCategoryService
{
    public function __construct(
        private ProductCategoryRepository $repository
    ) {}

    public function getAllCategories()
    {
        return $this->repository->getAll();
    }

    public function getCategory(int $id): ?ProductCategory
    {
        return $this->repository->find($id);
    }

    public function createCategory(array $data): ProductCategory
    {
        return $this->repository->create($data);
    }

    public function updateCategory(ProductCategory $category, array $data): bool
    {
        return $this->repository->update($category, $data);
    }

    public function deleteCategory(ProductCategory $category): bool
    {
        return $this->repository->delete($category);
    }
    public function restoreCategory(int $id): bool
    {
        return $this->repository->restore($id);
    }

    public function forceDeleteCategory(int $id): bool
    {
        return $this->repository->forceDelete($id);
    }

}
