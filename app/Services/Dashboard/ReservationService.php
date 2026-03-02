<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\ReservationRepository;

class ReservationService
{
    protected $reservationRepository;
    // __construct
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    // get one
    public function getOne($id)
    {
        $reservation = $this->reservationRepository->getOne($id);
        if (!$reservation) {
            return false;
        }
        return $reservation;
    }

    //get reservations
    public function getReservations()
    {
        return $this->reservationRepository->getReservations();
    }

    // get active
    public function getActive()
    {
        return $this->reservationRepository->getActive();
    }

    // get all (alias for getReservations in the new structure)
    public function getAll($request = null)
    {
        return $this->reservationRepository->getReservations();
    }

    // store reservation
    public function store($data)
    {
        $reservation = $this->reservationRepository->store($data);
        if (!$reservation) {
            return false;
        }
        return $reservation;
    }

    //update reservation
    public function update($data)
    {
        $reservation = self::getOne($data['id']);
        if (!$reservation) {
            return false;
        }

        $reservation = $this->reservationRepository->update($reservation, $data);
        if (!$reservation) {
            return false;
        }
        return $reservation;
    }

    // destroy reservation
    public function destroy($id)
    {
        $reservation = self::getOne($id);
        if (!$reservation) {
            return false;
        }
        $reservation = $this->reservationRepository->destroy($reservation);
        if (!$reservation) {
            return false;
        }
        return $reservation;
    }


}
