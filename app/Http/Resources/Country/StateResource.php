<?php

namespace App\Http\Resources\Country;

use Illuminate\Http\Resources\Json\JsonResource;

class StateResource extends JsonResource
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
            'state_id' => $this->id,
            'state_name' => $this->state_name,
            'cities' => count($this->cities()->get()),
            'country' => $this->country()->get()->pluck('country_name'),
        ];
    }
}
