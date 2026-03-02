<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightTicket>
 */
class FlightTicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tiers = ['Economy Saver', 'Economy Flex', 'Business Class', 'First Class Premium'];
        $tier = fake()->randomElement($tiers);

        $fromCity = City::inRandomOrder()->first();
        $fromCountryId = $fromCity ? $fromCity->country_id : 1;
        $fromCityId = $fromCity ? $fromCity->id : 1;

        $toCity = City::where('id', '!=', $fromCityId)->inRandomOrder()->first() ?? $fromCity;
        $toCountryId = $toCity ? $toCity->country_id : 2;
        $toCityId = $toCity ? $toCity->id : 2;

        $destination = $toCity ? $toCity->getTranslation('name', 'en') : 'International';

        $titleEn = "$tier to $destination";
        $titleAr = "تذكرة $tier إلى $destination";

        return [
            'title' => ['en' => $titleEn, 'ar' => $titleAr],
            'details' => [
                'en' => fake()->paragraph(2),
                'ar' => 'تفاصيل تذكرة الطيران والخدمات المشمولة في هذه الفئة من السفر.'
            ],
            'price' => random_int(200, 3500),
            'from_country_id' => $fromCountryId,
            'from_city_id' => $fromCityId,
            'to_country_id' => $toCountryId,
            'to_city_id' => $toCityId,
            'status' => 1,
            'photo' => '',
        ];
    }
}
