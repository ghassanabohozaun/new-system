<?php

namespace App\Repositories\Api;

use App\Models\Reservation;

class ReservationRepository
{
    // get reservations
    public function getReservations($limit = null)
    {
        if ($limit == null) {
            return Reservation::get();
        }
        return Reservation::limit($limit)->get();
    }

    // store
    public function store($data)
    {
        return Reservation::create($data);
    }
}
