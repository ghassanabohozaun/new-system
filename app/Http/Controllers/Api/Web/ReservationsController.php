<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Web\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Services\Api\ReservationService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class ReservationsController extends Controller
{
    use ApiResponse;
    protected $reservationService;
    // constructor
    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    //  reservations
    public function reservations()
    {
        $reservations = $this->reservationService->getReservations();
        $data = ['reservations' => ReservationResource::collection($reservations->load(['flight', 'ticket', 'depatureCountry', 'toCountry', 'fromCountry', 'toCity', 'fromCity']))];
        return $this->ApiResponse($data, true, __('general.data_fetch_successfully'), 200);
    }

    // store
    public function store(ReservationRequest $request)
    {
        $reservation = $this->reservationService->store($request->validated());
        $data = ['reservation' => new ReservationResource($reservation->load(['flight', 'ticket', 'depatureCountry', 'toCountry', 'fromCountry', 'toCity', 'fromCity']))];
        return $this->ApiResponse($data, true, __('general.add_success_message'), 200);
    }
}
