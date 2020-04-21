<?php

namespace App\Http\Resources\Event;

use Illuminate\Http\Resources\Json\JsonResource;

class EventByIdResource extends JsonResource
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
                    'id' => $this->id,
                    'title' => $this->title,
                    'loction' => $this->loction,
                    'status' => $this->status,
                    'description' => $this->description,
                    'start_date' => $this->start_date->format('Y-m-d'),
                    'last_date' => $this->last_date->format('Y-m-d'),
                    'event_image' => url('http://localhost:8000/storage/event/'.$this->event_image),
                ];
    }
}
