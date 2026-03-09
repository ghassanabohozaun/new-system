<?php

namespace App\Repositories\Api;

use App\Models\Flight;

class FlightRepository
{
    // get flights
    public function getFlights($limit = null)
    {
        if ($limit == null) {
            return Flight::active()->latest()->get();
        }
        return Flight::active()->latest()->limit($limit)->get();
    }
}
