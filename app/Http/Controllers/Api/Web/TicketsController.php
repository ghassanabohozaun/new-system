<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Services\Api\TicketService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    use ApiResponse;

    protected $ticketService;
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    // tickets
    public function tickets()
    {
        $tickets = $this->ticketService->getTickets();
        $data = ['tickets' => TicketResource::collection($tickets->load(['fromCountry','toCountry','formCity','toCity']))];
        return $this->ApiResponse($data, true, __('general.data_fetch_successfully'), 200);
    }
}
