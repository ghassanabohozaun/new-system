<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Website\ToursService;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    protected $toursService;
    //Create a new class instance.
    public function __construct(ToursService $toursService)
    {
        $this->toursService = $toursService;
    }

    // get all trips
    public function index()
    {
        $title = __('website.tours');
        $tours = $this->toursService->getAllTours();
        return view('website.tours', compact('title', 'tours'));
    }
}
