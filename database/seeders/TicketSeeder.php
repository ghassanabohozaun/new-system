<?php

namespace Database\Seeders;

use App\Models\FlightTicket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         FlightTicket::factory()->count(50)->create();
    }
}
