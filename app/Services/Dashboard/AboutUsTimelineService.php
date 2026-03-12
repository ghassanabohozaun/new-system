<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\AboutUsTimelineRepository;

class AboutUsTimelineService
{
    protected $timelineRepository;

    public function __construct(AboutUsTimelineRepository $timelineRepository)
    {
        $this->timelineRepository = $timelineRepository;
    }

    public function getTimelines()
    {
        return $this->timelineRepository->getTimelines();
    }

    public function getTimeline($id)
    {
        return $this->timelineRepository->getTimeline($id);
    }

    public function storeTimeline($request)
    {
        return $this->timelineRepository->storeTimeline($request->validated());
    }

    public function updateTimeline($request, $id)
    {
        return $this->timelineRepository->updateTimeline($request->validated(), $id);
    }

    public function destroyTimeline($id)
    {
        return $this->timelineRepository->destroyTimeline($id);
    }
}
