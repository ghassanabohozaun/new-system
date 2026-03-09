<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends BaseResource
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
            'title' => $this->title,
            'details' => $this->details,
            'price' => round($this->price, 2),
            'country_id' => $this->country_id,
            'country_name' => $this->country->name,
            'city_id' => $this->city_id,
            'city_name' => $this->city->name,
            'tour_guide_name' => $this->tour_guide_name,
            'status' => $this->status ? 1 : 0,
            'photo' => $this->getImageUrl($this->photo, 'tours'),
        ];
    }
}
