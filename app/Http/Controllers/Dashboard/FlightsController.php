<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\Dashboard\CategorySevice;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\FlightService;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    protected $flightService, $countryService, $cityService, $sponsershipOrganizationService, $sponsershipStatusService, $sponsershipTypeService, $categorySevice;
    // __construct

    public function __construct(FlightService $flightService, CountryService $countryService, CityService $cityService, CategorySevice $categorySevice)
    {
        $this->flightService = $flightService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;
        $this->categorySevice = $categorySevice;
    }

    // index
    public function index(Request $request)
    {
        $title = __('flights.flights');
        $flights = $this->flightService->getFlightsPaginated(10, $request->all());

        if ($request->ajax()) {
            return view('dashboard.flights.partials._table', compact('flights'))->render();
        }

        $countries = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $categories = $this->categorySevice->getAllCategories();
        return view('dashboard.flights.index', compact('title', 'flights', 'countries', 'cities', 'categories'));
    }

    // create
    public function create()
    {
        $title = __('flights.create_new_flight');
        $countries = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $categories = $this->categorySevice->getAllCategories();
        return view('dashboard.flights.create', compact('title', 'countries', 'cities', 'categories'));
    }

    // store
    public function store(Request $request)
    {
        //
    }

    // show
    public function show(string $id)
    {
        $flight = $this->flightService->getFlightsWithRelations($id);
        if (!$flight) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.flights.index');
        }

        $title = __('flights.show_flight');
        $countries = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $FlightID = $id;
        return view('dashboard.flights.show', compact('title', 'FlightID', 'flight'));
    }

    // edit
    public function edit(string $id)
    {
        $flight = $this->flightService->getFlightsWithRelations($id);
        if (!$flight) {
            flash()->error(__('general.no_record_found'));
            return redirect()->route('dashboard.flights.index');
        }
        $title = __('flights.update_flight');
        $countries = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        $categories = $this->categorySevice->getAllCategories();
        $FlightID = $id;
        return view('dashboard.flights.edit', compact('title', 'FlightID', 'flight', 'countries', 'cities', 'categories'));
    }

    // update
    public function update(Request $request, string $id)
    {
        //
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $status = $this->flightService->destroyFlight($request->id);

                if ($status === 'success') {
                    return response()->json(['status' => true], 200);
                } elseif ($status === 'restricted') {
                    return response()->json(['status' => false, 'message' => __('flights.restricted_deletion')], 422);
                } elseif ($status === 'not_found') {
                    return response()->json(['status' => false, 'message' => __('general.no_record_found')], 404);
                }

                return response()->json(['status' => false, 'message' => __('messages.error')], 500);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
            }
        }
    }

    // changeStatus
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $flight = $this->flightService->changeStatus($request->id, $request->statusSwitch);
            if (!$flight) {
                return response()->json(['status' => false], 500);
            }
            return response()->json(['status' => true, 'data' => $flight], 200);
        }
    }

    // get cities
    public function getCities($country_id)
    {
        $cities = City::where('country_id', $country_id)->pluck('name', 'id');
        return response()->json($cities);
    }
}
