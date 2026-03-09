<?php

namespace App\Repositories\Api;

use App\Models\Tour;

class TourRepository
{
    // get tours
    public function getTours($limit = null)
    {
        if ($limit == null) {
            return Tour::active()->latest()->get();
        }
        return Tour::active()->latest()->limit($limit)->get();
    }
}
