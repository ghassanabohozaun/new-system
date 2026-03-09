<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Dashboard\WeatherService;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    protected $weatherService;

    // حقن الخدمة (Dependency Injection)
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index(Request $request)
    {
        // الحصول على اسم المدينة من البحث، وإذا لم يوجد نمرر null
        $city = $request->input('city');

        $weatherData = null;
        if ($city) {
            $weatherData = $this->weatherService->getCurrentWeather($city);
        }

        return view('dashboard.weather.index', compact('weatherData', 'city'));
    }
}
