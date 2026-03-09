<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends BaseResource
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
            'title' => $this->title,
            'details' => $this->details,
            'price' => round($this->price, 2),
            'from_country_id' => $this->from_country_id,
            'from_country_name' => $this->fromCountry->name,
            'from_city_id' => $this->from_city_id,
            'from_city_name' => $this->formCity->name,
            'to_country_id' => $this->to_country_id,
            'to_country_name' => $this->toCountry->name,
            'to_city_id' => $this->to_city_id,
            'to_city_name' => $this->toCity->name,
            'status' => $this->status ? 1 : 0,
            'photo' => $this->getImageUrl($this->photo, 'tickets'),
        ];
    }
}
