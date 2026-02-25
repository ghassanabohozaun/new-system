<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\GovernorateRequest;
use App\Services\Dashboard\GovernorateService;
use Illuminate\Http\Request;

class GovernoratiesController extends Controller
{
    protected $governorateService;
    // __construct
    public function __construct(GovernorateService $governorateService)
    {
        $this->governorateService = $governorateService;
    }
    // index
    public function index()
    {
        $title = __('addresses.governorates');
        $governorates = $this->governorateService->getGovernoraties();
        return view('dashboard.addresses.governorates.index', compact('title', 'governorates'));
    }

    // get cities by governorate id
    public function getCitesByGovernrateID($governorate_id)
    {
        $title = __('addresses.cities');
        $cities = $this->governorateService->getAllCitiesbyGovernorate($governorate_id);
        return view('dashboard.addresses.cities.index', compact('title', 'cities'));
    }

    //create
    public function create()
    {
        $title = __('addresses.create_new_governorate');
        return view('dashboard.addresses.governorates.create', compact('title'));
    }

    // store
    public function store(GovernorateRequest $request)
    {
        $governorate = $this->governorateService->storeGovernorate($request);
        if (!$governorate) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $governorate], 200);
    }

    // show
    public function show(string $id)
    {
        //
    }

    // edit
    public function edit(string $id)
    {
        $title = __('addresses.update_governorate');
        $governorate = $this->governorateService->getGovernorate($id);

        if (!$governorate) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }
        return view('dashboard.addresses.governorates.edit', compact('title', 'governorate'));
    }

    // update
    public function update(GovernorateRequest $request, string $id)
    {
        $governorate = $this->governorateService->getGovernorate($id);
        $governorate = $this->governorateService->updateGovernorate($request, $id);
        if (!$governorate) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true, 'data' => $governorate], 201);
    }

    // change status
    public function changeStatus($id)
    {
        $governorate = $this->governorateService->changeStatus($id);
        if (!$governorate) {
            return response()->json(['status' => false] , 500);
        }
        $governorate = $this->governorateService->getGovernorate($id);
        return response()->json(['status' => true, 'data' => $governorate]);
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->json()) {
            $governorate = $this->governorateService->destroyGovernorate($request->id);
            if (!$governorate) {
                return response()->json(['status' => false],500);
            }
            return response()->json(['status' => true] , 200);
        }
    }

    //  get all cities by governorate
    public function getAllCitiesByGovernorate(Request $request)
    {
        if ($request->json()) {
            $cities = $this->governorateService->getAllCitiesbyGovernorate($request->id);
            return response()->json(['data' => $cities]);
        }
    }
}
