<?php

namespace App\Http\Controllers\Public;

use App\Services\Public\PublicProductCategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function __construct(
        private PublicProductCategoryService $service
    ) {}

    public function index(Request $request)
    {
        return response()->json(
            $this->service->getPaginatedCategories($request->input('per_page', 6)),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

    public function withProducts(Request $request)
    {
        return response()->json(
            $this->service->getCategoriesWithProducts($request->input('per_page', 6)),
            200,
            [],
            JSON_PRETTY_PRINT
        );
    }

}
