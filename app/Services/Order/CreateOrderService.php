<?php

namespace App\Services\Order;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Events\OrderCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class CreateOrderService
{
    public function execute(User $user, array $items): Order
    {
        return DB::transaction(function () use ($user, $items) {
            
            $order = $this->createOrder($user);
            $total = $this->attachItemsAndCalculateTotal($order, $items);
            $this->updateOrderTotal($order, $total);

            event(new OrderCreated($order));
            
            return $order->loadMissing('items.product');
        });
    }

    private function createOrder(User $user): Order
    {
        return Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
            'total_price' => 0,
        ]);
    }

    private function attachItemsAndCalculateTotal(Order $order, array $items): int
    {

        $total = 0;

        foreach ($items as $item) {
            $product = $this->getProductForOrder($item);
            $quantity = $item['quantity'];

            $this->ensureStockIsEnough($product, $quantity);
            $this->createOrderItem($order, $product, $quantity);

            $total += $this->calculateItemTotal($product, $quantity);
        }

        return $total;
    }

    private function getProductForOrder(array $item): Product
    {
        return Product::lockForUpdate()->findOrFail($item['product_id']);
    }

    private function ensureStockIsEnough(Product $product, int $quantity): void
    {
        if ($product->stock < $quantity) {
            throw ValidationException::withMessages([
                'stock' => "Omborda yetarli mahsulot yo‘q.",
            ]);
        }
    }

    private function createOrderItem(Order $order, Product $product, int $quantity): void
    {
        $order->items()->create([
            'product_id' => $product->id,
            'quantity' => $quantity,
            'price' => $product->price
        ]);
    }

    private function calculateItemTotal(Product $product, int $quantity): float|int
    {
        return $product->price * $quantity;
    }

    private function updateOrderTotal(Order $order, int $total): void
    {
        $order->update([
            'total_price' => $total
        ]);
    }

}
