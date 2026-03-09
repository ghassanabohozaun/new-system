<?php

namespace App\Services\Api;

use App\Repositories\Api\TourRepository;

class TourService
{
    protected $tourRepository;
    //Create a new class instance.
    public function __construct(TourRepository $tourRepository)
    {
        $this->tourRepository = $tourRepository;
    }

    //get tours
    public function getTours($limit = null)
    {
        return $this->tourRepository->getTours($limit);
    }
}
