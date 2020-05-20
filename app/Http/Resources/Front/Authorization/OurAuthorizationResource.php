<?php

namespace App\Http\Resources\Front\Authorization;

use Illuminate\Http\Resources\Json\JsonResource;

class OurAuthorizationResource extends JsonResource
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
            'type' => $this->auth_type,
            'title' => $this->authorization_name,
            'auth_image' => url(env('APP_URL').'/storage/authorization/'.$this->auth_image)
        ];

    }
}
