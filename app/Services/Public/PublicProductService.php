<?php

namespace App\Services\Public;

use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Http\Requests\Public\ProductFilterRequest;

class PublicProductService
{
    public function getPaginatedProducts(ProductFilterRequest $request): LengthAwarePaginator
    {
        $perPage = $request->input('per_page', 6);

        return Product::with('category')->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getProductDetails(Product $product): Product
    {
        return $product->load('category');
    }
}
