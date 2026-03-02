<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $airlines = ['Emirates', 'Qatar Airways', 'Turkish Airlines', 'Etihad Airways', 'Lufthansa'];
        $destinations = ['Dubai', 'Istanbul', 'London', 'Paris', 'New York', 'Tokyo', 'Rome'];

        $airline = fake()->randomElement($airlines);
        $destination = fake()->randomElement($destinations);
        $flightNo = fake()->unique()->bothify('??###'); // e.g. QR102, EK405

        $nameEn = "$airline ($flightNo) - $destination Exclusive Tour";
        $nameAr = "جولة حصرية ($flightNo) - $airline إلى $destination ";

        $days = random_int(3, 15);
        $nights = $days - 1;

        $city = City::inRandomOrder()->first();
        $countryId = $city ? $city->country_id : 1;
        $cityId = $city ? $city->id : 1;

        return [
            'name' => ['en' => $nameEn, 'ar' => $nameAr],
            'slug' => ['en' => \Illuminate\Support\Str::slug($nameEn), 'ar' => \Illuminate\Support\Str::slug($nameEn)],
            'details' => [
                'en' => fake()->paragraph(3),
                'ar' => 'هذا النص هو مثال لتفاصيل الرحلة السياحية والخدمات المقدمة فيها.'
            ],
            'status' => 1,
            'days_num' => $days,
            'nights_num' => $nights,
            'views' => random_int(100, 5000),
            'country_id' => $countryId,
            'city_id' => $cityId,
            'category_id' => Category::inRandomOrder()->first()->id ?? 1,
            'offer_duration_from' => now()->subDays(random_int(1, 10)),
            'offer_duration_to' => now()->addDays(random_int(10, 60)),
        ];
    }
}
