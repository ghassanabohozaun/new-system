<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CityRequest;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use Illuminate\Http\Request;

class CitiesController extends Controller
{
    protected $cityService, $countryService;

    public function __construct(CityService $cityService, CountryService $countryService)
    {
        $this->cityService = $cityService;
        $this->countryService = $countryService;
    }
    // index
    public function index(Request $request)
    {
        $title = __('addresses.cities');
        $filters = $request->all();
        $cities = $this->cityService->getCities($filters);
        $countries = $this->countryService->getAllCountriesWithoutRelations();

        if ($request->ajax()) {
            return view('dashboard.addresses.cities.partials._table', compact('cities'))->render();
        }

        return view('dashboard.addresses.cities.index', compact('title', 'cities', 'countries'));
    }

    // create
    public function create()
    {
        $title = __('addresses.create_new_city');
        return view('dashboard.addresses.cities.create', compact('title'));
    }

    // store
    public function store(CityRequest $request)
    {
        $city = $this->cityService->storeCity($request);
        if (!$city) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $city], 200);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('addresses.update_city');
        $city = $this->cityService->getCity($id);
        if (!$city) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        $countries = $this->countryService->getCountries();
        return view('dashboard.addresses.cities.edit', compact('title', 'city', 'countries'));
    }

    // update
    public function update(CityRequest $request, string $id)
    {
        $city = $this->cityService->getCity($id);

        $city = $this->cityService->updateCity($request, $id);
        if (!$city) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $city], 201);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $status = $this->cityService->destroyCity($request->id);
                if ($status === 'success') {
                    return response()->json(['status' => true], 200);
                } elseif ($status === 'restricted') {
                    return response()->json(['status' => false, 'message' => __('addresses.city_restricted_deletion')], 422);
                } elseif ($status === 'not_found') {
                    return response()->json(['status' => false, 'message' => __('general.no_record_found')], 404);
                }
                return response()->json(['status' => false, 'message' => __('general.error')], 500);
            } catch (\Exception $e) {
                return response()->json(['status' => false, 'message' => $e->getMessage()], 500);
            }
        }
    }

    // autocomplete City
    public function autocompleteCity(Request $request)
    {
        $data = $this->cityService->autocompleteCity($request->get('q'), $request->get('country_id'));
        return response()->json($data);
    }
}
