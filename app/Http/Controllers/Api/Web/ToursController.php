<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Services\Api\TourService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    use ApiResponse;

    protected $tourService;

    //constructor
    public function __construct(TourService $tourService)
    {
        $this->tourService = $tourService;
    }

    // tours
    public function tours()
    {
        $tours = $this->tourService->getTours();
        $data = ['tours' => TourResource::collection($tours->load(['country', 'city']))];
        return $this->ApiResponse($data, true, __('general.data_fetch_successfully'), 200);
    }
}
