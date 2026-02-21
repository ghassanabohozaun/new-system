<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\GovernorateService;

class DashboardController extends Controller
{
    protected $governorateService, $cityService;
    public function __construct(GovernorateService $governorateService, CityService $cityService)
    {
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    public function index()
    {
        $title = __('dashboard.home');
        return view('dashboard.home.index', compact('title'));
    }

    // addresses
    public function addresses()
    {
        $governorates = $this->governorateService->getAllGovernoratesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('dashboard.address', compact('governorates', 'cities'));
    }
}
