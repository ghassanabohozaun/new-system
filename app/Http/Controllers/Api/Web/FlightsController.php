<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\FlightResource;
use App\Services\Api\FlightService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Mpdf\Tag\Th;

class FlightsController extends Controller
{
    use ApiResponse;

    protected $flightService;
    //__construct
    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    // flights
    public function flights()
    {
        $flights = $this->flightService->getFlights();
        $data = ['flights' => FlightResource::collection($flights->load(['country','city','category','flightServices','flightPrices','flightNotes','flightIncludings','flightNotIncludings']))];
        return $this->ApiResponse($data, true, __('general.data_fetch_successfully'), 200);
    }
}
