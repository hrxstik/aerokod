<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(
        private ProductService $service
    ) {}

    public function index()
    {
        return $this->service->getAllProducts();
    }

    public function store(ProductRequest $request)
    {
        return $this->service->createProduct($request->validated());
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function update(ProductRequest $request, Product $product)
    {
        $this->service->updateProduct($product, $request->validated());
        return $product;
    }

    public function destroy(Product $product)
    {
        $this->service->deleteProduct($product);
        return response()->noContent();
    }

    public function restore(int $id)
    {
        $this->service->restoreProduct($id);
        return response()->noContent();
    }

}
