<?php

namespace App\Listeners;

use App\Notifications\NewOrderNotification;
use App\Events\OrderCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminAboutNewOrder
{
    public function handle(OrderCreated $event): void
    {
        $order = $event->order;

        $admins = User::where('role', 'admin')->get();

        foreach ($admins as $admin) {
            $admin->notify(
                new NewOrderNotification($order)
            );
        }
    }
}
