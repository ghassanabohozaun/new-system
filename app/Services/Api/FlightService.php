<?php

namespace App\Services\Api;

use App\Repositories\Api\FlightRepository;

class FlightService
{
    protected $flightRepository;
    //Create a new class instance.
    public function __construct(FlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }

    // get flights
    public function getFlights($limit = null)
    {
        return $this->flightRepository->getFlights($limit);
    }
}
