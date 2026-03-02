<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ReservationRequest;
use App\Models\Reservation;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\FlightService;
use App\Services\Dashboard\FlightTicketService;
use App\Services\Dashboard\ReservationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class ReservationsController extends Controller
{
    protected $reservationService, $flightService, $flightTicketService, $countryService;
    public function __construct(ReservationService $reservationService, FlightService $flightService, FlightTicketService $flightTicketService, CountryService $countryService)
    {
        $this->reservationService = $reservationService;
        $this->flightService = $flightService;
        $this->flightTicketService = $flightTicketService;
        $this->countryService = $countryService;
    }

    // index
    public function index()
    {
        $title = __('reservations.reservations');
        $flights = $this->flightService->getFlights();
        $tickets = $this->flightTicketService->getTickets();
        $countries = $this->countryService->getActiveCountries();

        $reservations = $this->reservationService->getAll();

        if (request()->ajax()) {
            return view('dashboard.reservations.partials._table', compact('reservations'))->render();
        }

        return view('dashboard.reservations.index', compact('title', 'flights', 'tickets', 'countries', 'reservations'));
    }

    // create
    public function create()
    {
        $title = __('reservations.create_new_reservation');
        $flights = $this->flightService->getFlights();
        $tickets = $this->flightTicketService->getTickets();
        $countries = $this->countryService->getActiveCountries();
        return view('dashboard.reservations.create', compact('title', 'flights', 'tickets', 'countries'));
    }

    // store
    public function store(ReservationRequest $request)
    {
        $data = $request->except(['_token']);
        $reservation = $this->reservationService->store($data);
        if (!$reservation) {
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
        $title = __('reservations.update_reservation');
        $reservation = $this->reservationService->getOne($id);
        if (!$reservation) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $flights = $this->flightService->getActiveFlights();
        $tickets = $this->flightTicketService->getActive();
        $countries = $this->countryService->getActiveCountries();

        return view('dashboard.reservations.edit', compact('title', 'flights', 'tickets', 'reservation', 'countries'));
    }

    // update
    public function update(ReservationRequest $request, string $id)
    {
        $data = $request->except(['_token']);
        $reservation = $this->reservationService->update($data);
        if (!$reservation) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // destroy
    public function destroy(Request $request)
    {
        $id = $request->id;
        $reservation = $this->reservationService->destroy($id);
        if (!$reservation) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
    // changeStatus



    // show report
    public function showReport()
    {
        $title = __('reservations.reports');

        // fliter columns
        $tableName = 'reservations'; // Replace with your table name
        $excludedColumns = ['id', 'deleted_at', 'updated_at','from_country_id', 'from_city_id', 'to_country_id', 'to_city_id',]; // Columns to exclude
        $allColumnNames = DB::getSchemaBuilder()->getColumnListing($tableName);
        $filteredColumnNames = collect($allColumnNames)
            ->filter(function ($column) use ($excludedColumns) {
                return !in_array($column, $excludedColumns);
            })
            ->values()
            ->toArray();

        $flights = $this->flightService->getFlights();
        $tickets = $this->flightTicketService->getTickets();

        return view('dashboard.reservations.report', compact('title', 'filteredColumnNames', 'flights', 'tickets'));
    }

}
