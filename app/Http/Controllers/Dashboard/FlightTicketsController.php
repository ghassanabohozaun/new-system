<?php

namespace App\Http\Controllers\Dashboard;

use App\Exports\TicketExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\TicketRequest;
use App\Models\FlightTicket;
use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\FlightTicketService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class FlightTicketsController extends Controller
{
    protected $flightTicketService, $countryService, $cityService;
    public function __construct(FlightTicketService $flightTicketService, CountryService $countryService, CityService $cityService)
    {
        $this->flightTicketService = $flightTicketService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;
    }

    public function index(Request $request)
    {
        $title = __('tickets.tickets');
        $tickets = $this->flightTicketService->getTicketsPaginated(10);

        if ($request->ajax()) {
            return view('dashboard.tickets.partials._table', compact('tickets'))->render();
        }

        $fromCountry = $request->filled('from_country_id') ? $this->countryService->getCountry($request->from_country_id) : null;
        $fromCity    = $request->filled('from_city_id')    ? $this->cityService->getCity($request->from_city_id) : null;
        $toCountry   = $request->filled('to_country_id')   ? $this->countryService->getCountry($request->to_country_id) : null;
        $toCity      = $request->filled('to_city_id')      ? $this->cityService->getCity($request->to_city_id) : null;

        return view('dashboard.tickets.index', compact('title', 'tickets', 'fromCountry', 'fromCity', 'toCountry', 'toCity'));
    }


    // create
    public function create()
    {
        $title = __('tickets.create_new_ticket');
        return view('dashboard.tickets.create', compact('title'));
    }

    // store
    public function store(TicketRequest $request)
    {
        $data = $request->only(['title', 'details', 'price', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'status', 'photo']);
        $ticket = $this->flightTicketService->store($data);
        if (!$ticket) {
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
        $title = __('tickets.update_ticket');
        $ticket = $this->flightTicketService->getOne($id);
        if (!$ticket) {
            flash()->error(__('general.no_record_found'));
            return redirect()->back();
        }

        $countries = $this->countryService->getAllCountriesWithoutRelations();
        $cities = $this->cityService->getAllCitiesWithoutRelation();
        return view('dashboard.tickets.edit', compact('title', 'ticket', 'countries', 'cities'));
    }

    // update
    public function update(TicketRequest $request, string $id)
    {
        $data = $request->only(['id', 'title', 'details', 'price', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'status', 'photo']);
        $ticket = $this->flightTicketService->update($data);
        if (!$ticket) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 201);
    }

    // destroy
    public function destroy(Request $request)
    {
        $id = $request->id;
        $ticket = $this->flightTicketService->destroy($id);
        if (!$ticket) {
            return response()->json(['status' => false], 500);
        }
        return response()->json(['status' => true], 200);
    }
    // changeStatus
    public function changeStatus(Request $request)
    {
        $ticket = $this->flightTicketService->changeStatus($request['id'], $request['statusSwitch']);
        if (!$ticket) {
            return response()->json(['status' => false], 500);
        }
        return response()->json([
            'status' => true,
            'data' => $ticket
        ], 200);
    }





    // delete photo


    public function export(Request $request)
    {
        $selectedColumns = $request->input('columns', ['id', 'title', 'details', 'price', 'status']);

        return response()->json(Excel::download(new TicketExport(FlightTicket::get(), $selectedColumns), 'tickets.xlsx'));

        // $filters = $request->only(['status']); // Get filters from request
        // $selectedColumns = $request->input('columns', ['id', 'name']); // Get selected columns from request
        //  return Excel::download(new AdminsExport($filters, $selectedColumns), 'dynamic_users.xlsx');
    }
}
