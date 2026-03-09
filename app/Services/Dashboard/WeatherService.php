<?php

namespace App\Services\Dashboard;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class WeatherService
{
    protected $apiKey;
    protected $baseUrl = 'http://api.weatherapi.com/v1';

    public function __construct()
    {
        $this->apiKey = config('services.weatherapi.key');
    }

    public function getCurrentWeather($city)
    {
        if (empty($city)) return null;

        $locale = app()->getLocale();

        // استخدام اسم المدينة واللغة في مفتاح الكاش لتجنب التداخل
        $cacheKey = "weather_{$city}_{$locale}";

        return Cache::remember($cacheKey, now()->addHour(), function () use ($city, $locale) {
            $response = Http::get("{$this->baseUrl}/forecast.json", [
                'key' => $this->apiKey,
                'q' => $city,
                'days' => 7, // نجلب الداتا لاسبوع
                'lang' => $locale, // طلب اللغة بناءً على لغة لوحة التحكم
                'aqi' => 'no',
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null; // في حال حدوث خطأ
        });
    }
}
