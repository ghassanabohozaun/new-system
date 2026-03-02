<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Flight;
use App\Models\FlightTicket;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $services = ['flight', 'tour', 'ticket'];
        $classTypes = ['direct_flight', 'transit'];
        $nationalities = ['Saudi', 'Emirati', 'Egyptian', 'Jordanian', 'British', 'American', 'Turkish'];

        $customerNotes = ['Please provide a window seat if possible.', 'I require a vegetarian meal during the flight.', 'Traveling with a senior citizen, may need wheelchair assistance.', 'Requesting a quiet zone seat.', 'Traveling for honeymoon, any special arrangements?', 'Need extra legroom if available.', 'Halal meal required for all passengers.'];

        $departure = now()->addDays(random_int(10, 60));

        $fromCity = \App\Models\City::inRandomOrder()->first();
        $fromCountryId = $fromCity ? $fromCity->country_id : 1;
        $fromCityId = $fromCity ? $fromCity->id : 1;

        $toCity = \App\Models\City::where('id', '!=', $fromCityId)->inRandomOrder()->first() ?? $fromCity;
        $toCountryId = $toCity ? $toCity->country_id : 2;
        $toCityId = $toCity ? $toCity->id : 2;

        return [
            'flight_id' => Flight::inRandomOrder()->first()?->id,
            'service' => fake()->randomElement($services),
            'client_name' => fake()->name(),
            'client_mobile' => fake()->e164PhoneNumber(),
            'client_email' => fake()->safeEmail(),
            'client_passport_number' => fake()->bothify('??#######'),
            'number_of_adult' => random_int(1, 4),
            'number_of_children' => random_int(0, 3),
            'number_of_babies' => random_int(0, 1),
            'nationality' => fake()->randomElement($nationalities),
            'depature_country_id' => $fromCountryId,
            'from_country_id' => $fromCountryId,
            'from_city_id' => $fromCityId,
            'to_country_id' => $toCountryId,
            'to_city_id' => $toCityId,
            'depature_date' => $departure->format('Y-m-d'),
            'return_date' => $departure->copy()->addDays(random_int(5, 15))->format('Y-m-d'),
            'ticket_id' => FlightTicket::inRandomOrder()->first()?->id,
            'economy_class_name' => fake()->randomElement(['Saver', 'Flexible', 'Premium', 'Prime']),
            'economy_class_type' => fake()->randomElement($classTypes),
            'notes' => fake()->randomElement($customerNotes),
            'created_at' => now()->subDays(random_int(1, 30)),
            'updated_at' => now(),
        ];
    }
}
