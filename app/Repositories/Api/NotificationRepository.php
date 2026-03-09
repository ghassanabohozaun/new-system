<?php

namespace App\Repositories\Api;

use App\Models\Notification;

class NotificationRepository
{
    // get notifications
    public function getNotifications()
    {
        return Notification::get();
    }

    // store notification
    public function sotre($data)
    {
        return Notification::create($data);
    }
}
