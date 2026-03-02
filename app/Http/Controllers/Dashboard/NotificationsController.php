<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\NotificationRequest;
use App\Services\Dashboard\NotificationService;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    protected $notificationService;
    //__construct
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    // index
    public function index()
    {
        $title = __('notifications.notifications');
        $notifications = $this->notificationService->getAll();
        return view('dashboard.notifications.index', compact('title', 'notifications'));
    }

    // get all
    public function getAll()
    {
        return $this->notificationService->getAll();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        $data = $request->only(['title', 'details', 'link']);
        $notification = $this->notificationService->create($data);
        if (!$notification) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $notification = $this->notificationService->destroy($id);
        if (!$notification) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // changeStatus
    public function changeStatus(Request $request)
    {
        // Toggle logic: find the notification first to get current status if not provided
        $id = $request->id;
        $notification = $this->notificationService->changeStatus($id);

        if (!$notification) {
            return response()->json(['status' => false], 500);
        }

        // Add translated labels and classes for the custom status handler
        // Note: Notifications use boolean 0/1, so we map them to premium styles
        $notification->status_label = $notification->status == 1 ? __('general.active') : __('general.inactive');
        $notification->status_class = $notification->status == 1 ? 'badge-pill-success' : 'badge-pill-danger';

        return response()->json(['status' => true, 'data' => $notification], 200);
    }
}
