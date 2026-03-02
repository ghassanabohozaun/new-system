<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TourRequest;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\TourService;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    protected $tourService, $countryService, $cityService;
    public function __construct(TourService $tourService, CountryService $countryService, CityService $cityService)
    {
        $this->tourService = $tourService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

    // index
    public function index(Request $request)
    {
        $title = __('tours.tours');
        $tours = $this->tourService->getToursPaginated(10);

        if ($request->ajax()) {
            return view('dashboard.tours.partials._table', compact('tours'))->render();
        }

        $country = $request->filled('country_id') ? $this->countryService->getCountry($request->country_id) : null;
        $city    = $request->filled('city_id')    ? $this->cityService->getCity($request->city_id) : null;

        return view('dashboard.tours.index', compact('title', 'tours', 'country', 'city'));
    }

    // create
    public function create()
    {
        $title = __('tours.create_new_tour');
        return view('dashboard.tours.create', compact('title'));
    }

    // store
    public function store(TourRequest $request)
    {
        $data = $request->only(['title', 'name', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name', 'photo', 'status']);
        $tour = $this->tourService->store($data);
        if (!$tour) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('tours.update_tour');
        $tour = $this->tourService->getOne($id);
        if (!$tour) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        return view('dashboard.tours.edit', compact('title', 'tour'));
    }

    // update
    public function update(TourRequest $request, string $id)
    {
        $data = $request->only(['id', 'title', 'name', 'details', 'price', 'country_id', 'city_id', 'tour_guide_name', 'photo', 'status']);
        $tour = $this->tourService->update($data);
        if (!$tour) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // destroy
    public function destroy(Request $request)
    {
        $id = $request->id;
        $tour = $this->tourService->destroy($id);
        if (!$tour) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }

    // changeStatus
    public function changeStatus(Request $request)
    {
        $tour = $this->tourService->changeStatus($request['id'], $request['statusSwitch']);
        if (!$tour) {
            return response()->json(['status' => false], 500);
        }
        return response()->json([
            'status' => true,
            'data' => $tour
        ], 200);
    }

    public function export(Request $request)
    {
        // $selectedColumns = $request->input('columns', ['id', 'title', 'details', 'price', 'status']);

        // return response()->json(Excel::download(new TicketExport(FlightTicket::get(), $selectedColumns), 'tours.xlsx'));

        // $filters = $request->only(['status']); // Get filters from request
        // $selectedColumns = $request->input('columns', ['id', 'name']); // Get selected columns from request
        //  return Excel::download(new AdminsExport($filters, $selectedColumns), 'dynamic_users.xlsx');
    }
}
