<?php

namespace App\Http\Resources\Front\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class OurEventResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'loction' => $this->loction,
            'start' => $this->start_date->format('d-M-Y'),
            'last' => $this->last_date->format('d-M-Y'),
            'event_image' => url(env('APP_URL').'/storage/event/'.$this->event_image),
        ];
    }
}
