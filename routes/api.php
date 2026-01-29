<?php

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Shop\ProductController;
use App\Http\Controllers\Shop\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotificationController;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::middleware('guest')->group(function () {
            Route::post('register', [AuthController::class, 'register']);
            Route::post('login', [AuthController::class, 'login']);
        });

        Route::middleware('auth:sanctum')->group(function () {
            Route::get('me', [AuthController::class, 'me']);
            Route::post('logout', [AuthController::class, 'logout']);
        });
    });


    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index']);
        Route::get('{category}', [CategoryController::class, 'show']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::middleware('can:create,' . \App\Models\Category::class)->post('/', [CategoryController::class, 'store']);
            Route::middleware('can:update,category')->put('{category}', [CategoryController::class, 'update']);
            Route::middleware('can:delete,category')->delete('{category}', [CategoryController::class, 'destroy']);
        });
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']);
        Route::get('{product}', [ProductController::class, 'show']);

        Route::middleware('auth:sanctum')->group(function () {
            Route::middleware('can:create,' . Product::class)->post('/', [ProductController::class, 'store']);
            Route::middleware('can:update,product')->put('{product}', [ProductController::class, 'update']);
            Route::middleware('can:delete,product')->delete('{product}', [ProductController::class, 'destroy']);
        });
    });

    Route::middleware('auth:sanctum')->prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'index']);
        Route::post('/', [OrderController::class, 'store']);

        Route::middleware('can:viewAny,' . Order::class)->get('/all', [OrderController::class, 'allOrders']);
        Route::middleware('can:view,order')->get('/{order}', [OrderController::class, 'show']);
        Route::middleware('can:update,order')->put('/{order}', [OrderController::class, 'update']);
        Route::middleware('can:delete,order')->delete('/{order}', [OrderController::class, 'destroy']);
    });

    Route::middleware('auth:sanctum')->prefix('notifications')->group(function () {
        Route::get('/', [NotificationController::class, 'notifications']);
        Route::get('/{id}/read', [NotificationController::class, 'markAsRead']);
        Route::get('/read-all', [NotificationController::class, 'markAllAsRead']);
    });
});
