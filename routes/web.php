<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\Public\ProductCategoryController as PublicProductCategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('public')->group(function () {
    Route::get('products', [PublicProductController::class, 'index']);
    Route::get('products/{product:slug}', [PublicProductController::class, 'show']);
    Route::get('product_categories', [PublicProductCategoryController::class, 'index']);
    Route::get('product_categories/with-products', [PublicProductCategoryController::class, 'withProducts']);
});

Route::middleware(['admin'])->group(function () {
    Route::apiResource('products', ProductController::class)->except(['index', 'show']);
    Route::prefix('products')->group(function () {
        Route::post('{id}/restore', [ProductController::class, 'restore'])->withTrashed();
    });

    Route::apiResource('product_categories', ProductCategoryController::class)->except(['index']);
    Route::prefix('product_categories')->group(function () {
        Route::post('{id}/restore', [ProductCategoryController::class, 'restore'])->withTrashed();
        Route::delete('{id}/force', [ProductCategoryController::class, 'forceDelete']);
    });
});
