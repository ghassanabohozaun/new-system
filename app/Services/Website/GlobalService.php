<?php

namespace App\Services\Website;

use App\Models\Category;
use App\Models\Slider;

class GlobalService
{
    protected $flightService;
    // constructor
    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }


    // get sliders
    public function getSliders()
    {
        return Slider::query()->active()->latest()->get();
    }

    // get categories
    public function getCategories()
    {
        return Category::query()->active()->latest()->take(5)->get();
    }

    // get home page flights
    public function getHomePageFlights($limit = null)
    {
        return [
            'latestFlights' => $this->flightService->getLatestFlights($limit),
            'mostRequestedFlights' => $this->flightService->getMostRequestedFlights($limit),
            'foreignTourismFlights' => $this->flightService->getForeignTourismFlight($limit),
            'domesticTourismFlights' => $this->flightService->getDomesticTourismFlight($limit),
            'hajjAndUmrahFlights' => $this->flightService->getHajjAndUmrahFlight($limit),
        ];
    }
}
