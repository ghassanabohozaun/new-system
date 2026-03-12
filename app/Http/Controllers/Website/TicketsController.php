<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\TicketService;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    protected $ticketService;
    //Create a new class instance.
    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    // get tickets
    public function index()
    {
        $title = __('website.tickets');
        $tickets = $this->ticketService->getAllTickets();
        return view('website.tickets', compact('title', 'tickets'));
    }
}
