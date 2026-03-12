<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutUsTimelineRequest;
use App\Services\Dashboard\AboutUsTimelineService;
use Illuminate\Http\Request;

class AboutUsTimelineController extends Controller
{
    protected $timelineService;

    public function __construct(AboutUsTimelineService $timelineService)
    {
        $this->timelineService = $timelineService;
    }

    public function index()
    {
        // Handled within AboutUsController@edit
    }

    public function store(AboutUsTimelineRequest $request)
    {
        $timeline = $this->timelineService->storeTimeline($request);
        if (!$timeline) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'message' => __('general.add_success_message'), 'data' => $timeline], 200);
    }

    public function update(AboutUsTimelineRequest $request, $id)
    {
        $timeline = $this->timelineService->updateTimeline($request, $id);
        if (!$timeline) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'message' => __('general.update_success_message'), 'data' => $timeline], 201);
    }

    public function destroy(Request $request)
    {
        $status = $this->timelineService->destroyTimeline($request->id);
        if (!$status) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true]);
    }
}
