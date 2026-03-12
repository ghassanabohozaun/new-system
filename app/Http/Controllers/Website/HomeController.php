<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;

use App\Models\AboutUsTimeline;
use App\Services\Website\GlobalService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $globalService;
    // constructor
    public function __construct(GlobalService $globalService)
    {
        $this->globalService = $globalService;
    }

    // index
    public function index()
    {
        $title = __('website.home');

        $sliders = $this->globalService->getSliders();
        $categories = $this->globalService->getCategories();
        $flights = $this->globalService->getHomePageFlights(10);

        return view('website.index', compact('title', 'sliders', 'categories', 'flights'));
    }

    // about
    public function about()
    {
        $title = __('website.about');
        $about = AboutUs::first();
        $timelines = AboutUsTimeline::orderBy('sort_order', 'asc')->get();
        return view('website.about', compact('title', 'about', 'timelines'));
    }

    // contact
    public function contact()
    {
        $title = __('website.contact');
        return view('website.contact', compact('title'));
    }
}
