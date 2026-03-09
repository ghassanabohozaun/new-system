<?php

namespace App\Repositories\Api;

use App\Models\FlightTicket;

class TicketRepository
{
    // get tickets
    public function getTickets($limit = null)
    {
        if ($limit == null) {
            return FlightTicket::active()->latest()->get();
        }

        return FlightTicket::active()->latest()->limit($limit)->get();
    }
}
