<?php

namespace App\Repositories\Dashboard;

use App\Models\FlightTicket;

class FlightTicketRepository
{
    // get one ticket
    public function getOne($id)
    {
        return FlightTicket::find($id);
    }


    // get Tickets
    public function getTickets(){
        return FlightTicket::get();
    }

    // get all tickets
    public function getAll($request)
    {

        return FlightTicket::orderByDesc('created_at')
            ->when(!empty(request()->price), function ($query) {
                $query->where('price', request()->price);
            })
            ->when(!empty(request()->title_ar), function ($query) {
                $query->where('title->ar', 'like', '%' . request()->title_ar . '%');
            })
            ->when(!empty(request()->title_en), function ($query) {
                $query->where('title->en', 'like', '%' . request()->title_en . '%');
            })
            ->when(!empty(request()->from_country_id), function ($query) {
                $query->where('from_country_id', request()->from_country_id);
            })
            ->when(!empty(request()->from_city_id), function ($query) {
                $query->where('from_city_id', request()->from_city_id);
            })
            ->when(!empty(request()->to_country_id), function ($query) {
                $query->where('to_country_id', request()->to_country_id);
            })
            ->when(!empty(request()->to_city_id), function ($query) {
                $query->where('to_city_id', request()->to_city_id);
            })
            ->when(request()->status != null, function ($query) {
                $query->where('status', request()->status);
            })
            ->select('id', 'title', 'details', 'price', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'status', 'photo', 'created_at')
            ->latest()
            ->get();
    }

    // get paginated tickets
    public function getTicketsPaginated($limit)
    {
        return FlightTicket::orderByDesc('created_at')
            ->when(!empty(request()->price), function ($query) {
                $query->where('price', request()->price);
            })
            ->when(!empty(request()->title_ar), function ($query) {
                $query->where('title->ar', 'like', '%' . request()->title_ar . '%');
            })
            ->when(!empty(request()->title_en), function ($query) {
                $query->where('title->en', 'like', '%' . request()->title_en . '%');
            })
            ->when(!empty(request()->from_country_id), function ($query) {
                $query->where('from_country_id', request()->from_country_id);
            })
            ->when(!empty(request()->from_city_id), function ($query) {
                $query->where('from_city_id', request()->from_city_id);
            })
            ->when(!empty(request()->to_country_id), function ($query) {
                $query->where('to_country_id', request()->to_country_id);
            })
            ->when(!empty(request()->to_city_id), function ($query) {
                $query->where('to_city_id', request()->to_city_id);
            })
            ->when(request()->status != null, function ($query) {
                $query->where('status', request()->status);
            })
            ->select('id', 'title', 'details', 'price', 'from_country_id', 'from_city_id', 'to_country_id', 'to_city_id', 'status', 'photo', 'created_at')
            ->paginate($limit);
    }

    // get active tickets
    public function getActive()
    {
        return FlightTicket::orderByDesc('created_at')->active()->get();
    }

    // store ticket
    public function store($ticket)
    {
        return FlightTicket::create($ticket);
    }

    //update ticket
    public function update($ticket, $data)
    {
        return $ticket->update($data);
    }

    // destroy ticket
    public function destroy($ticket)
    {
        return $ticket->forceDelete();
    }

    public function changeStatus($ticket, $status)
    {
        $ticket->update([
            'status' => $status,
        ]);
        return $ticket;
    }


}
