<?php

namespace App\Http\Resources\Country;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'city_id' => $this->id,
            'city_name' => $this->city_name,
            'state_name' => $this->state()->get()->pluck('state_name'),
            'country_name' => $this->state()->with('country')->get()->pluck('country')->pluck('country_name'),
        ];
    }
}
