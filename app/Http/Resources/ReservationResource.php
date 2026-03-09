<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'flight_id' => $this->flight_id,
            'flight_name' => $this->flight->name,
            'service' => $this->reservationService(),
            'client_name' => $this->client_name,
            'client_mobile' => $this->client_mobile,
            'client_email' => $this->client_email,
            'client_passport_number' => $this->client_passport_number,
            'number_of_adult' => $this->number_of_adult,
            'number_of_children' => $this->number_of_children,
            'number_of_babies' => $this->number_of_babies,
            'nationality' => $this->nationality,
            'depature_country_id' => $this->depature_country_id,
            'depature_date' => $this->depature_date,
            'return_date' => $this->return_date,
            'ticket_id' => $this->ticket_id,
            'ticket_name' => $this->ticket->name,
            // 'from_country_id' => $this->from_country_id,
            // 'from_country_name' => $this->fromCountry->name,
            // 'from_city_id' => $this->from_city_id,
            // 'from_city_name' => $this->fromCity->name,
            // 'to_country_id' => $this->to_country_id,
            // 'to_country_name' => $this->toCountry->name,
            // 'to_city_id' => $this->to_city_id,
            // 'to_city_name' => $this->toCity->name,
            'economy_class_name' => $this->economy_class_name,
            'economy_class_type' => $this->reservationEconomyClassType(),
            'notes' => $this->notes,
            'created_at' => $this->formatDateLocatiazied($this->created_at, app()->locale, 'l, d F Y , h:i a'),
            'updated_at' => $this->formatDateLocatiazied($this->updated_at, app()->locale, 'l, d F Y , h:i a'),
        ];
    }
}
