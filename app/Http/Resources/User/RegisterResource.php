<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class RegisterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // $defaultData = parent::toArray($request);

        $defaultData =[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'created_at' => $this->created_at,
            'profile_image' => url('http://localhost:8000/storage/profile/'.$this->profile_image),
        ];

        $additionalData = [
          'role'=> $this->roles->first(),
        ];

        return array_merge($defaultData, $additionalData);
    }
}
