<?php

namespace App\Services\Website;

use App\Models\Tour;

class ToursService
{
    // get all trips
    public function getAllTours()
    {
        $trips = Tour::query()->with(['country','city'])->active()->select('*')->latest()->get();
        return $trips;
    }
}
