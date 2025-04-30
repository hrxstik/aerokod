<?php

namespace App\Http\Controllers;

use App\Services\ProductCategoryService;
use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function __construct(
        private ProductCategoryService $service
    ) {}

    public function index()
    {
        return $this->service->getAllCategories();
    }

    public function store(ProductCategoryRequest $request)
    {
        return $this->service->createCategory($request->validated());
    }

    public function show(ProductCategory $category)
    {
        return $category;
    }

    public function update(ProductCategoryRequest $request, ProductCategory $category)
    {
        $this->service->updateCategory($category, $request->validated());
        return $category;
    }

    public function destroy(ProductCategory $category)
    {
        $this->service->deleteCategory($category);
        return response()->noContent();
    }

    public function restore(int $id)
    {
        $this->service->restoreCategory($id);
        return response()->noContent();
    }

    public function forceDelete(int $id)
    {
        $this->service->forceDeleteCategory($id);
        return response()->noContent();
    }
}
