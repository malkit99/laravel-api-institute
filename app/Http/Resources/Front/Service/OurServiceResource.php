<?php

namespace App\Http\Resources\Front\Service;

use Illuminate\Http\Resources\Json\JsonResource;

class OurServiceResource extends JsonResource
{

    public function toArray($request)
    {
        // return parent::toArray($request);
        return[
            'service' => $this->service_name,
            'description' => $this->description,
            'service_image' => url(env('APP_URL').'/storage/service/'.$this->service_image)
        ];
    }
}
