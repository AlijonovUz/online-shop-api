<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Support\Response;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications(Request $request)
    {
        $notifications = $request->user()->notifications;
        return Response::success(NotificationResource::collection($notifications));
    }

    public function markAsRead(Request $request, $id)
    {
        $notification = $request->user()
            ->notifications()
            ->findOrFail($id);

        $notification->markAsRead();

        return Response::success(new NotificationResource($notification));
    }

    public function markAllAsRead(Request $request)
    {
        $user = $request->user();
        $hasUnread = $user->unreadNotifications()->exists();

        if ($hasUnread) {
            $user->unreadNotifications->markAsRead();
            return Response::success(['message' => "Barcha bildirishnomalar o'qilgan deb belgilandi"]);
        }
        
        return Response::error(404, "O'qilmagan bildirishnomalar yo'q", isFriendly: true);
    }
}
