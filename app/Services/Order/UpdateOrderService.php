<?php

namespace App\Services\Order;

use App\Events\OrderStatusUpdated;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class UpdateOrderService
{
    public function execute(Order $order, string $newStatus): Order
    {
        return DB::transaction(function () use ($order, $newStatus) {
            $order->loadMissing('items.product');

            $oldStatus = $order->status;

            if ($oldStatus === $newStatus) {
                return $order;
            }

            if ($oldStatus === "delivered") {
                throw ValidationException::withMessages([
                    'status' => "Yetkazilgan buyurtma holatini o‘zgartirib bo‘lmaydi.",
                ]);
            }

            if ($oldStatus === "pending" && $newStatus === "confirmed") {
                $this->decreaseProductStock($order);
            }

            if ($oldStatus === "confirmed" && $newStatus === "cancelled") {
                $this->increaseProductStock($order);
            }

            $order->update([
                'status' => $newStatus
            ]);

            event(new OrderStatusUpdated(
                $order,
                $oldStatus,
                $newStatus
            ));

            return $order;

        });
    }

    private function decreaseProductStock(Order $order): void
    {
        foreach ($order->items as $item) {
            $product = $item->product;

            if ($product->stock < $item->quantity) {
                throw ValidationException::withMessages([
                    'stock' => "Mahsulot '{$product->name}' uchun yetarli zaxira yo'q.",
                ]);
            }

            $product->decrement('stock', $item->quantity);
        }
    }

    private function increaseProductStock(Order $order): void
    {
        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }
    }
}