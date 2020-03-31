<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserResource extends JsonResource
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
            'id'        =>  $this->id,
            'name'      =>  $this->name,
            'email'     =>  $this->email,
            'mobile'    =>  $this->mobile,
            'profile_image' =>url('http://localhost:8000/storage/profile/'.$this->profile_image),
            'roles'     =>  $this->getRoleNames(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ];
    }
}
