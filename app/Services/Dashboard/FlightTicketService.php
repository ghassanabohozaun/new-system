<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\FlightTicketRepository;
use App\Utils\ImageManagerUtils;
use Yajra\DataTables\Facades\DataTables;

class FlightTicketService
{
    protected $flightTicketRepository, $imageManagerUtils;
    // __construct
    public function __construct(FlightTicketRepository $flightTicketRepository, ImageManagerUtils $imageManagerUtils)
    {
        $this->flightTicketRepository = $flightTicketRepository;
        $this->imageManagerUtils = $imageManagerUtils;
    }

    // get one
    public function getOne($id)
    {
        $ticket = $this->flightTicketRepository->getOne($id);
        if (!$ticket) {
            return false;
        }
        return $ticket;
    }

    // get Tickets
    public function getTickets()
    {
        return $this->flightTicketRepository->getTickets();
    }

    // get active
    public function getActive()
    {
        return $this->flightTicketRepository->getActive();
    }

    // get paginated tickets
    public function getTicketsPaginated($limit)
    {
        return $this->flightTicketRepository->getTicketsPaginated($limit);
    }



    // store ticket
    public function store($data)
    {
        if (array_key_exists('photo', $data) && $data['photo'] != null) {
            $photo_name = $this->imageManagerUtils->saveResizeImage($data['photo'], 'tickets', 1000, 1000);
            $data['photo'] = $photo_name;
        }

        $ticket = $this->flightTicketRepository->store($data);
        if (!$ticket) {
            return false;
        }
        return $ticket;
    }

    //update ticket
    public function update($data)
    {
        $ticket = self::getOne($data['id']);
        if (!$ticket) {
            return false;
        }

        if (isset($data['is_photo_deleted']) && $data['is_photo_deleted'] == "1") {
            if (!empty($ticket->photo)) {
                $this->imageManagerUtils->removeImageFromLocal($ticket->photo, 'tickets');
            }
            $data['photo'] = null;
        } elseif (array_key_exists('photo', $data) && $data['photo'] != null) {
            $this->imageManagerUtils->removeImageFromLocal($ticket->photo, 'tickets');
            $photo_name = $this->imageManagerUtils->saveResizeImage($data['photo'], 'tickets', 1000, 1000);
            $data['photo'] = $photo_name;
        }

        $ticket = $this->flightTicketRepository->update($ticket, $data);
        if (!$ticket) {
            return false;
        }
        return $ticket;
    }

    // destroy ticket
    public function destroy($id)
    {
        $ticket = self::getOne($id);
        if (!$ticket) {
            return false;
        }
        if (!empty($ticket->photo)) {
            $this->imageManagerUtils->removeImageFromLocal($ticket->photo, 'tickets');
        }

        $ticket = $this->flightTicketRepository->destroy($ticket);
        if (!$ticket) {
            return false;
        }
        return $ticket;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $ticket = self::getOne($id);
        if (!$ticket) {
            return false;
        }
        $ticket = $this->flightTicketRepository->changeStatus($ticket, $status);
        if (!$ticket) {
            return false;
        }
        return $ticket;
    }




}
