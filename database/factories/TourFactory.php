<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tourOptions = [
            [
                'en' => ['name' => 'Golden Hour Desert Safari', 'title' => 'Experience the magic of the dunes at sunset'],
                'ar' => ['name' => 'سفاري الصحراء وقت الغروب', 'title' => 'اختبر سحر الكثبان الرملية عند غروب الشمس']
            ],
            [
                'en' => ['name' => 'Historical City Walking Tour', 'title' => 'Explore the hidden gems of the ancient old town'],
                'ar' => ['name' => 'جولة سير في المدينة التاريخية', 'title' => 'استكشف الجواهر الخفية في المدينة القديمة']
            ],
            [
                'en' => ['name' => 'Luxurious Private Yacht Cruise', 'title' => 'Sail in style along the stunning coastline'],
                'ar' => ['name' => 'رحلة يخت خاصة فاخرة', 'title' => 'أبحر بأناقة على طول الساحل المذهل']
            ],
            [
                'en' => ['name' => 'Mountain Peak Adventure Hike', 'title' => 'Reach new heights with our expert mountain guides'],
                'ar' => ['name' => 'مغامرة تسلق قمة الجبل', 'title' => 'صل إلى قمم جديدة مع مرشدينا الجبليين الخبراء']
            ],
            [
                'en' => ['name' => 'Traditional Food & Culture Experience', 'title' => 'A culinary journey through authentic local flavors'],
                'ar' => ['name' => 'تجربة الطعام والثقافة التقليدية', 'title' => 'رحلة طهي عبر النكهات المحلية الأصيلة']
            ],
        ];

        $option = fake()->randomElement($tourOptions);
        $uniqueId = fake()->unique()->numberBetween(100, 999);
        $guides = ['Ahmed Mansour', 'Sarah Johnson', 'Youssef Al-Fahad', 'Elena Rodriguez', 'Dimitri Volkov'];

        $city = City::inRandomOrder()->first();
        $countryId = $city ? $city->country_id : 1;
        $cityId = $city ? $city->id : 1;

        return [
            'name' => [
                'en' => $option['en']['name'] . " #$uniqueId",
                'ar' => $option['ar']['name'] . " #$uniqueId"
            ],
            'title' => [
                'en' => $option['en']['title'],
                'ar' => $option['ar']['title']
            ],
            'details' => [
                'en' => fake()->paragraph(4),
                'ar' => 'هذا النص هو مثال لتفاصيل الجولة السياحية والأنشطة المتضمنة فيها والخدمات التي سيحصل عليها العميل خلال الرحلة السياحية والتعرف على المعالم.'
            ],
            'price' => random_int(50, 1200),
            'country_id' => $countryId,
            'city_id' => $cityId,
            'tour_guide_name' => [
                'en' => fake()->randomElement($guides),
                'ar' => 'مرشد سياحي خبير ومؤهل'
            ],
            'photo' => '',
            'status' => 1,
        ];
    }
}
