<?php

namespace App\Repositories\Dashboard;

use App\Models\Reservation;

class ReservationRepository
{
    // get one reservation
    public function getOne($id)
    {
        return Reservation::find($id);
    }

    public function getReservations()
    {
        return Reservation::latest('updated_at')
            ->when(request()->filled('search_term'), function ($q) {
                $q->search(request()->search_term);
            })
            ->when(request()->filled('service'), function ($q) {
                $q->where('service', request()->service);
            })

            ->when(request()->filled('depature_country_id'), function ($q) {
                $q->where('depature_country_id', request()->depature_country_id);
            })
            ->when(request()->filled('flight_id'), function ($q) {
                $q->where('flight_id', request()->flight_id);
            })
            ->when(request()->filled('depature_date'), function ($q) {
                $q->whereDate('depature_date', request()->depature_date);
            })
            ->when(request()->filled('return_date'), function ($q) {
                $q->whereDate('return_date', request()->return_date);
            })
            ->when(request()->filled('economy_class_type'), function ($q) {
                $q->where('economy_class_type', request()->economy_class_type);
            })
            ->when(request()->filled('created_at'), function ($q) {
                $q->whereDate('created_at', request()->created_at);
            })
            ->paginate(request()->limit ?? 10);
    }

    // get active reservations
    public function getActive()
    {
        return Reservation::orderByDesc('created_at')->active()->get();
    }

    // store reservation
    public function store($reservation)
    {
        return Reservation::create($reservation);
    }

    //update reservation
    public function update($reservation, $data)
    {
        return $reservation->update($data);
    }

    // destroy reservation
    public function destroy($reservation)
    {
        return $reservation->delete();
    }


}
