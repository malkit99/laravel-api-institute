<?php

namespace App\Http\Resources\Authorization;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthorizationResource extends JsonResource
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
            'authorization_name' => $this->authorization_name,
            'auth_type' => $this->auth_type,
            'status' => $this->status,
            'publish_at' => $this->created_at->format('Y-m-d'),
            'auth_image' => url('http://localhost:8000/storage/authorization/'.$this->auth_image),
        ];
    }
}
