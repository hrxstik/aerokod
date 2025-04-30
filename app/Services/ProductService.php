<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductService
{
    public function __construct(
        private ProductRepository $repository
    ) {}

    public function getAllProducts()
    {
        return $this->repository->getAll();
    }

    public function getProduct(int $id): ?Product
    {
        return $this->repository->find($id);
    }

    public function createProduct(array $data): Product
    {
        return $this->repository->create($data);
    }

    public function updateProduct(Product $product, array $data): bool
    {
        return $this->repository->update($product, $data);
    }

    public function deleteProduct(Product $product): bool
    {
        return $this->repository->delete($product);
    }
    public function restoreProduct(int $id): bool
    {
        return Product::withTrashed()->findOrFail($id)->restore();
    }
}
