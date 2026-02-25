<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('cities')->truncate();

        $cities = [
            // egypt
            [
                'name' => [
                    'en' => 'Kafr el-Sheikh Governorate',
                    'ar' => 'كفر الشيخ',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Cairo Governorate',
                    'ar' => 'القاهرة',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Damietta Governorate',
                    'ar' => 'دمياط',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Aswan Governorate',
                    'ar' => 'أسوان',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Sohag Governorate',
                    'ar' => 'سوهاج',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'North Sinai Governorate',
                    'ar' => 'شمال سيناء',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Monufia Governorate',
                    'ar' => 'المنوفيا',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Port Said Governorate',
                    'ar' => 'بورسعيد',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Beni Suef Governorate',
                    'ar' => 'بني سويف',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Matrouh Governorate',
                    'ar' => 'مطروح',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Suez Governorate',
                    'ar' => 'السويس',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Qalyubia Governorate',
                    'ar' => 'القليوبية',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Gharbia Governorate',
                    'ar' => 'الغربية',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Alexandria Governorate',
                    'ar' => 'الاسكندرية',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Asyut Governorate',
                    'ar' => 'أسيوط',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'South Sinai Governorate',
                    'ar' => 'جنوب سيناء',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Faiyum Governorate',
                    'ar' => 'الفيوم',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Giza Governorate',
                    'ar' => 'الجيزة',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Red Sea Governorate',
                    'ar' => 'البحر الأحمر',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Beheira Governorate',
                    'ar' => 'البحيرة',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Luxor Governorate',
                    'ar' => 'الأقصر',
                ],
                'country_id' => 2,
            ],

            [
                'name' => [
                    'en' => 'Minya Governorate',
                    'ar' => 'المينيا',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Ismailia Governorate',
                    'ar' => 'الاسماعيلية',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Dakahlia Governorate',
                    'ar' => 'الدقهلية',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'New Valley Governorate',
                    'ar' => 'الوداي الجديد',
                ],
                'country_id' => 2,
            ],
            [
                'name' => [
                    'en' => 'Qena Governorate',
                    'ar' => 'قنا',
                ],
                'country_id' => 2,
            ],

            // sudia arabia
            [
                'name' => [
                    'en' => 'Riyadh Region',
                    'ar' => 'منطقة الرياض',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Makkah Region',
                    'ar' => 'منطقة مكة',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Al Madinah Region',
                    'ar' => 'منطقة المدينة',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Asir Region',
                    'ar' => 'منطقة عسير',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Tabuk Region',
                    'ar' => 'منطقة تبوك',
                ],
                'country_id' => 1,
            ],
            [
                'name' => [
                    'en' => 'Jizan Region',
                    'ar' => 'منطقة جيزان',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Northern Borders Region',
                    'ar' => 'منطقة الحدود الشمالية',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Al Jawf Region',
                    'ar' => 'منطقة الجوف',
                ],
                'country_id' => 1,
            ],

            [
                'name' => [
                    'en' => 'Al Bahah Region',
                    'ar' => 'منطقة الباحة',
                ],
                'country_id' => 1,
            ],
            [
                'name' => [
                    'en' => 'Najran Region',
                    'ar' => 'منطقة نجران',
                ],
                'country_id' => 1,
            ],
            [
                'name' => [
                    'en' => 'Al-Qassim Region',
                    'ar' => 'منطقة القسيم',
                ],
                'country_id' => 1,
            ],

            /// United Arabic Emirates
            [
                'name' => [
                    'en' => 'Dubai',
                    'ar' => 'دبي',
                ],
                'country_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Umm al-Quwain',
                    'ar' => 'أم القيوين',
                ],
                'country_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Fujairah',
                    'ar' => 'الفجيرة',
                ],
                'country_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Ras al-Khaimah',
                    'ar' => 'رأس الخيمة',
                ],
                'country_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Ajman Emirate',
                    'ar' => 'إمارة عجمان',
                ],
                'country_id' => 3,
            ],
            [
                'name' => [
                    'en' => 'Abu Dhabi Emirate',
                    'ar' => 'إمارة ابو ظبي',
                ],
                'country_id' => 3,
            ],

            [
                'name' => [
                    'en' => 'Omman',
                    'ar' => 'عمان',
                ],
                'country_id' => 4,
            ],

            [
                'name' => [
                    'en' => 'Irbid',
                    'ar' => 'إربد',
                ],
                'country_id' => 4,
            ],
            [
                'name' => [
                    'en' => 'Zarqa',
                    'ar' => 'الزرقاء',
                ],
                'country_id' => 4,
            ],
            [
                'name' => [
                    'en' => 'Karak',
                    'ar' => 'الكرك',
                ],
                'country_id' => 4,
            ],
            [
                'name' => [
                    'en' => 'Jerash',
                    'ar' => 'جرش',
                ],
                'country_id' => 4,
            ],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
