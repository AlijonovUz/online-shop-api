<?php

namespace App\Notifications;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderStatusChangedNotification extends Notification
{
    use Queueable;

    public Order $order;
    public string $oldStatus;
    public string $newStatus;

    public function __construct(Order $order, string $oldStatus, string $newStatus)
    {
        $this->order = $order;
        $this->oldStatus = $oldStatus;
        $this->newStatus = $newStatus;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toArray(object $notifiable): array
    {
        return [
            'title' => 'Buyurtma holati o‘zgardi',
            'order_id' => $this->order->id,
            'from' => $this->oldStatus,
            'to' => $this->newStatus,
            'message' => $this->message(),
        ];
    }

    private function message(): string
    {
        return match ($this->newStatus)
        {
            'confirmed' => "Buyurtmangiz tasdiqlandi.",
            'cancelled' => "Buyurtmangiz bekor qilindi.",
            'delivered' => "Buyurtmangiz yetkazildi.",
            default => "Buyurtma holati yangilandi."
        };
    }
}
