<?php

namespace App\Services\Website;

use App\Models\FlightTicket;

class TicketService
{
    // get all tecktes
    public function getAllTickets()
    {
        $tickets = FlightTicket::query()->with('country', 'city', 'images', 'category', 'ticketServices', 'ticketPrices', 'ticketNotes', 'ticketIncludings', 'ticketNotIncludings')
        ->active()->select('*')->latest()->get();
        return $tickets;
    }
}
