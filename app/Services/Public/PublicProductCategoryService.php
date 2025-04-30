<?php

namespace App\Services\Public;

use App\Models\ProductCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PublicProductCategoryService
{
    public function getPaginatedCategories(int $perPage = 6): LengthAwarePaginator
    {
        return ProductCategory::query()
            ->whereNull('deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString();
    }

    public function getCategoriesWithProducts(int $perPage = 6): array
    {
        $paginator = ProductCategory::with(['products' => fn($q) => $q->whereNull('deleted_at')])
            ->whereNull('deleted_at')
            ->paginate($perPage);

        return [
            'data' => $paginator->getCollection()->map(function ($category) {
                return [
                    'id' => $category->id,
                    'title' => $category->title,
                    'products' => $category->products->map(fn($p) => [
                        'id' => $p->id,
                        'title' => $p->title,
                        'slug' => $p->slug,
                        'description' => $p->description,
                    ]),
                ];
            }),
            'meta' => [
                'current_page' => $paginator->currentPage(),
                'last_page' => $paginator->lastPage(),
                'per_page' => $paginator->perPage(),
                'total' => $paginator->total(),
            ]
        ];
    }
}
