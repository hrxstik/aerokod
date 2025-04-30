<?php

namespace App\Http\Controllers\Public;

use App\Services\Public\PublicProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Public\ProductFilterRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function __construct(
        private PublicProductService $service
    ) {}

    public function index(ProductFilterRequest $request)
    {
        return response()->json(
            $this->service->getPaginatedProducts($request)
        );
    }

    public function show(Product $product)
    {
        return response()->json(
            $this->service->getProductDetails($product)
        );
    }
}
