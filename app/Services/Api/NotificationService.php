<?php

namespace App\Services\Api;

use App\Repositories\Api\NotificationRepository;

class NotificationService
{
    protected $notificationRepository;
    // Create a new class instance.
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    // get notifications
    public function getNotifications()
    {
        return $this->notificationRepository->getNotifications();
    }

    // store
    public function store($data)
    {
        return $this->notificationRepository->sotre($data);
    }
}
