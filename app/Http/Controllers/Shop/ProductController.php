<?php

namespace App\Http\Controllers\Shop;

use App\Filters\ProductFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Resources\Shop\ProductResource;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Support\PaginationMeta;
use App\Support\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductFilter $filter)
    {
        $products = $filter->apply(Product::query())
            ->with('category')
            ->latest()
            ->paginate(10);

        return Response::success([
            'results' => ProductResource::collection($products),
            'meta' => PaginationMeta::from($products)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('products');

        $product = Product::create($validated);
        $product->loadMissing('category');

        return Response::success(new ProductResource($product), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->loadMissing('category');
        return Response::success(new ProductResource($product));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $validated = $request->validated();

        if ($request->hasFile('products')) {
            if ($product->image) {
                Storage::delete($product->image);
            }

            $validated['image'] = $request->file('image')->store('products');
        }

        $product->update($validated);
        $product->loadMissing('category');

        return Response::success(new ProductResource($product));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->noContent();
    }
}
