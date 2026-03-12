<?php

namespace App\Services\Website;

use App\Models\Flight;

class FlightService
{
    // get all flights
    public function getAllFlights()
    {
        $flights = Flight::query()
            ->with(['country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings'])
            ->active()
            ->select('*')
            ->latest()
            ->get();

        return $flights;
    }

    // get latest flights
    public function getLatestFlights($limit = null)
    {
        $flights = Flight::query()
            ->with(['country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings'])
            ->active()
            ->select('*')
            ->latest();
        if ($limit) {
            return $flights->paginate($limit);
        }
        return $flights->paginate(20);
    }

    // get most requested flights
    public function getMostRequestedFlights($limit = null)
    {
        $flights = Flight::query()
            ->with(['country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings'])
            ->withCount('reservations')
            ->active()
            ->orderBy('reservations_count', 'desc');

        if ($limit) {
            return $flights->paginate($limit);
        }
        return $flights->paginate(20);
    }

    // get domestic tourism flight
    public function getDomesticTourismFlight($limit = null)
    {
        $flights = Flight::query()
            ->with(['country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings'])
            ->active()
            ->select('*')
            ->where('category_id', 1)
            ->latest();
        if ($limit) {
            return $flights->paginate($limit);
        }
        return $flights->paginate(20);
    }

    // get foreign tourism flight
    public function getForeignTourismFlight($limit = null)
    {
        $flights = Flight::query()
            ->with(['country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings'])
            ->active()
            ->select('*')
            ->where('category_id', 2)
            ->latest();
        if ($limit) {
            return $flights->paginate($limit);
        }
        return $flights->paginate(20);
    }

    // get hajj and umrah flight
    public function getHajjAndUmrahFlight($limit = null)
    {
        $flights = Flight::query()->with('country', 'city', 'images', 'category', 'flightServices', 'flightPrices', 'flightNotes', 'flightIncludings', 'flightNotIncludings')->active()->select('*')->where('category_id', 3)->latest();
        if ($limit) {
            return $flights->paginate($limit);
        }
        return $flights->paginate(20);
    }
}
