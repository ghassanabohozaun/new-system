<?php

namespace App\Repositories\Dashboard;

use App\Models\AboutUsTimeline;
use App\Traits\QueryTrait;

class AboutUsTimelineRepository
{
    use QueryTrait;

    public function getTimelines()
    {
        return AboutUsTimeline::orderBy('sort_order','asc')->get();
    }

    public function getTimeline($id)
    {
        return AboutUsTimeline::find($id);
    }

    public function storeTimeline($data)
    {
        return AboutUsTimeline::create($data);
    }

    public function updateTimeline($data, $id)
    {
        $timeline = $this->getTimeline($id);
        if ($timeline) {
            $timeline->update($data);
            return $timeline;
        }
        return false;
    }

    public function destroyTimeline($id)
    {
        $timeline = $this->getTimeline($id);
        if ($timeline) {
            return $timeline->delete();
        }
        return false;
    }
}
