<?php

namespace App\Listeners;

use App\Events\OrderStatusUpdated;
use App\Notifications\OrderStatusChangedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUserAboutOrderStatus
{
    public function handle(OrderStatusUpdated $event): void
    {
        $user = $event->order->user;

        if ($user) {
            $user->notify(
                new OrderStatusChangedNotification(
                    $event->order,
                    $event->oldStatus,
                    $event->newStatus
                )
            );
        }
    }
}
