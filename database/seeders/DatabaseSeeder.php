<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SettingSeeder::class,
            RoleSeeder::class,
            AdminSeeder::class,
            CountrySeeder::class,
            CitySeeder::class,
            DepartmentSeeder::class,
            CategorySeeder::class,
            FlightSeeder::class,
            TicketSeeder::class,
            ReservationSeeder::class,
            TourSeeder::class,
        ]);
    }
}
