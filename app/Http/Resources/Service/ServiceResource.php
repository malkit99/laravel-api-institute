<?php

namespace App\Http\Resources\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            'service_name' => $this->service_name,
            'status' => $this->status,
            'description' => $this->description,
            'created_at' => $this->created_at->format('d-M-Y'),
            'service_image' => url(env('APP_URL').'/storage/service/'.$this->service_image),
        ];
    }
}
