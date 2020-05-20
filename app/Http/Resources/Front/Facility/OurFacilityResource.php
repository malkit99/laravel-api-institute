<?php

namespace App\Http\Resources\Front\Facility;

use Illuminate\Http\Resources\Json\JsonResource;

class OurFacilityResource extends JsonResource
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
        return [
            'facility_name' => $this->facility_name,
            'title' => $this->title,
            'description' => $this->description,
            'facility_image' => url(env('APP_URL').'/storage/facility/'.$this->facility_image),
        ];

    }
}
