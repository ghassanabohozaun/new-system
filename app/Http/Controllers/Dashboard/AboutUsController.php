<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\AboutUsRequest;
use App\Services\Dashboard\AboutUsService;
use App\Services\Dashboard\AboutUsTimelineService;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    protected $aboutUsService;
    protected $timelineService;

    public function __construct(AboutUsService $aboutUsService, AboutUsTimelineService $timelineService)
    {
        $this->aboutUsService = $aboutUsService;
        $this->timelineService = $timelineService;
    }

    public function edit()
    {
        $about = $this->aboutUsService->getAboutUs();
        $timelines = $this->timelineService->getTimelines();
        $title = __('dashboard.about_us');
        return view('dashboard.about_us.edit', compact('about', 'timelines', 'title'));
    }

    public function update(AboutUsRequest $request)
    {
        $about = $this->aboutUsService->updateAboutUs($request);
        if (!$about) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'message' => __('general.update_success_message')]);
    }
}
