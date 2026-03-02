<?php

namespace App\Services\Dashboard;

use App\Repositories\dashboard\NotificationRepository;

class NotificationService
{
    protected $notificationRepository;
    // __constructor
    public function __construct(NotificationRepository $notificationRepository)
    {
        $this->notificationRepository = $notificationRepository;
    }

    // get one
    public function getOne($id)
    {
        $mail = $this->notificationRepository->getOne($id);
        if (!$mail) {
            return false;
        }
        return $mail;
    }

    // get all
    public function getAll()
    {
        return $this->notificationRepository->getAll();
    }

    // create
    public function create($data)
    {
        $notification = $this->notificationRepository->create($data);
        if (!$notification) {
            return false;
        }
        return $notification;
    }

    // update
    public function update($data)
    {
        $notification = self::getOne($data['id']);
        if (!$notification) {
            return false;
        }

        $notification = $this->notificationRepository->update($data, $notification);
        if (!$notification) {
            return false;
        }
        return $notification;
    }

    // destroy
    public function destroy($id)
    {
        $notification = self::getOne($id);
        if (!$notification) {
            return false;
        }

        $notification = $this->notificationRepository->destroy($notification);
        if (!$notification) {
            return false;
        }
        return $notification;
    }

    // change status
    public function changeStatus($id, $status = null)
    {
        $notification = self::getOne($id);
        if (!$notification) {
            return false;
        }

        $notification = $this->notificationRepository->changeStatus($notification, $status);
        if (!$notification) {
            return false;
        }
        return $notification;
    }
}
