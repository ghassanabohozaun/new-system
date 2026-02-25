<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('countries')->truncate() ;

        $countries = [
            [
                'id' => 1,
                'phone_code' => '996',
                'name' => [
                    'en' => 'Saudi Arabia',
                    'ar' => 'المملكة العربية السعودية',
                ],
                'flag_code' => 'sa',
            ],

            [
                'id' => 2,
                'phone_code' => '20',
                'name' => [
                    'en' => 'Eqypt',
                    'ar' => 'جمهورية مصر العربية  ',
                ],
                'flag_code' => 'eg',
            ],

            [
                'id' => 3,
                'phone_code' => '971',
                'name' => [
                    'en' => 'United Arabic Emirates',
                    'ar' => 'الإمارات العربية المتحدة ',
                ],
                'flag_code' => 'ae',
            ],

            [
                'id' => 4,
                'phone_code' => '962',
                'name' => [
                    'en' => 'Jordan',
                    'ar' => 'الأردن',
                ],
                'flag_code' => 'jo',
            ],

            [
                'id' => 5,
                'phone_code' => '961',
                'name' => [
                    'en' => 'Lebanon',
                    'ar' => 'لبنان',
                ],
                'flag_code' => 'lb',
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
