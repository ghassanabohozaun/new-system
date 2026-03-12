<?php

namespace App\Services\Website;

use App\Models\Reservation;

class ResevationService
{

    // store
    public function store($data)
    {
        return Reservation::create($data);
    }
}
