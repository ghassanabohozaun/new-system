<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Models\Reservation;
use App\Models\Tour;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;

class DashboardController extends Controller
{
    protected $cityService, $countryService;
    public function __construct(CityService $cityService, CountryService $countryService )
    {
        $this->cityService = $cityService;
        $this->countryService = $countryService;
    }

    public function index()
    {
        $title = __('dashboard.home');

        // Month Data for Main Chart
        $flightReservationsData = $this->getMonthlyReservationsData('flight');
        $ticketReservationsData = $this->getMonthlyReservationsData('ticket');

        // Suggestion 1: Service Distribution
        $serviceDistribution = $this->getServiceDistributionData();

        // Suggestion 3: Top Nationalities
        $topNationalities = $this->getTopNationalitiesData();

        // Suggestion 5: Most Viewed Flights
        $mostViewedFlights = $this->getMostViewedFlightsData();

        // 2. Demographics Data
        $demographics = $this->getDemographicsData();

        // 4. Content Status Data
        $contentStatus = $this->getContentStatusData();

        // 6. Top Destination Countries
        $topDestinations = $this->getTopDestinationsData();

        // 7. Trip Type Distribution
        $tripTypes = $this->getTripTypesData();

        // 8. Recent Reservations
        $recentReservations = Reservation::orderByDesc('created_at')->limit(5)->get();

        return view('dashboard.home.index', compact(
            'title',
            'flightReservationsData',
            'ticketReservationsData',
            'serviceDistribution',
            'topNationalities',
            'mostViewedFlights',
            'demographics',
            'contentStatus',
            'topDestinations',
            'tripTypes',
            'recentReservations'
        ));
    }

    // addresses
    public function addresses()
    {
        $counties = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('dashboard.address', compact('counties', 'cities'));
    }

    /**
     * Get monthly reservations count for a specific service for the current year.
     *
     * @param string $service
     * @return array
     */
    protected function getMonthlyReservationsData(string $service): array
    {
        $currentYear = now()->year;

        $reservations = Reservation::where('service', $service)
            ->whereYear('created_at', $currentYear)
            ->selectRaw('COUNT(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Initialize array with zeros for all 12 months
        $data = array_fill(0, 12, 0);

        foreach ($reservations as $month => $count) {
            $data[$month - 1] = $count;
        }

        return $data;
    }

    // 1. Service Distribution Data
    protected function getServiceDistributionData()
    {
        return Reservation::whereYear('created_at', now()->year)
            ->selectRaw('service, COUNT(*) as count')
            ->groupBy('service')
            ->pluck('count', 'service')
            ->toArray();
    }

    // 3. Top 5 Nationalities
    protected function getTopNationalitiesData()
    {
        return Reservation::whereYear('created_at', now()->year)
            ->whereNotNull('nationality')
            ->selectRaw('nationality, COUNT(*) as count')
            ->groupBy('nationality')
            ->orderByDesc('count')
            ->limit(5)
            ->pluck('count', 'nationality')
            ->toArray();
    }

    // 5. Most Viewed Flights
    protected function getMostViewedFlightsData()
    {
        return Flight::orderByDesc('views')
            ->limit(5)
            ->get(['name', 'views'])
            ->mapWithKeys(function ($item) {
                return [$item->name => $item->views];
            })
            ->toArray();
    }

    // 2. Demographics Data
    protected function getDemographicsData()
    {
        $currentYear = now()->year;
        return Reservation::whereYear('created_at', $currentYear)
            ->selectRaw('SUM(number_of_adult) as adults, SUM(number_of_children) as children, SUM(number_of_babies) as babies')
            ->first()
            ->toArray();
    }

    // 4. Content Status Data
    protected function getContentStatusData()
    {
        return [
            'active_flights' => Flight::where('status', 1)->count(),
            'inactive_flights' => Flight::where('status', 0)->count(),
            'active_tours' => Tour::where('status', 1)->count(),
            'inactive_tours' => Tour::where('status', 0)->count(),
        ];
    }

    // 6. Top Destinations Data
    protected function getTopDestinationsData()
    {
        return Reservation::whereYear('created_at', now()->year)
            ->whereNotNull('to_country_id')
            ->selectRaw('to_country_id, COUNT(*) as count')
            ->groupBy('to_country_id')
            ->with('toCountry')
            ->orderByDesc('count')
            ->limit(5)
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->toCountry->name ?? 'N/A' => $item->count];
            })
            ->toArray();
    }

    // 7. Trip Type Distribution Data
    protected function getTripTypesData()
    {
        return Reservation::whereYear('created_at', now()->year)
            ->whereNotNull('economy_class_type')
            ->selectRaw('economy_class_type, COUNT(*) as count')
            ->groupBy('economy_class_type')
            ->pluck('count', 'economy_class_type')
            ->toArray();
    }
}
