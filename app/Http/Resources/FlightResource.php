<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends BaseResource
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
            'name' => $this->name,
            'slug' => $this->slug,
            'details' => $this->details,
            'status' => $this->status,
            'days_num' => $this->days_num,
            'nights_num' => $this->nights_num,
            'views' => $this->views,
            'country_id' => $this->country_id,
            'country_name' => $this->country->name,
            'city_id' => $this->city_id,
            'city_name' => $this->city->name,
            'category_id' => $this->category_id,
            'category_name' => $this->category->name,
            'offer_duration_from' => $this->offer_duration_from,
            'offer_duration_to' => $this->offer_duration_to,
            'base_image' => $this->getImageUrl($this->images->first()->file_name ?? '', 'flights'),
            'all_image' => $this->getImagesUrl($this->images->pluck('file_name'), 'flights'),
            'flight_services' => FlightServiceResource::collection($this->flightServices),
            'flight_prices' => FlightPriceResource::collection($this->flightPrices),
            'flight_notes' => FlightNoteResource::collection($this->flightNotes),
            'flight_includings' => FlightIncludingResource::collection($this->flightIncludings),
            'flight_not_includings' => FlightNotIncludingResource::collection($this->flightNotIncludings),
        ];
    }
}
