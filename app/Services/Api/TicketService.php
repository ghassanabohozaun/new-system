<?php

namespace App\Services\Api;

use App\Repositories\Api\TicketRepository;

class TicketService
{
    protected $ticketRepository;
    //Create a new class instance
    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    // get tickets
    public function getTickets($limit = null)
    {
        return $this->ticketRepository->getTickets($limit);
    }
}
