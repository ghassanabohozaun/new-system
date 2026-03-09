<?php

namespace App\Services\Api;

use App\Repositories\Api\ReservationRepository;

class ReservationService
{
    protected $reservationRepository;
    //Create a new class instance.
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    // get reservations
    public function getReservations($limit = null)
    {
        return $this->reservationRepository->getReservations($limit);
    }

    // store
    public function store($data) {
       return $this->reservationRepository->store($data);
    }
}
