<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\FlightService;
use App\Services\Website\ProductService;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class FlightsController extends Controller
{
    protected $flightService;
    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    // get flights  by category
    public function getFlightsByCategory($category_slug)
    {
        switch ($category_slug) {
            case 'domestic-tourism':
                $flights = $this->flightService->getDomesticTourismFlight();
                break;
            case 'foreign-tourism':
                $flights = $this->flightService->getForeignTourismFlight();
                break;
            case 'hajj-and-umrah':
                $flights = $this->flightService->getHajjAndUmrahFlight();
                break;
            default:
                abort(404);
                break;
        }

        $title = __('website.flights');

        return view('website.flights', compact('title', 'flights', 'category'));
    }
}
