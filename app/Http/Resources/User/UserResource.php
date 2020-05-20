<?php

namespace App\Http\Resources\User;

use App\Http\Resources\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

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



        // return [
        //     'id'        =>  $this->id,
        //     'name'      =>  $this->name,
        //     'email'     =>  $this->email,
        //     'mobile'    =>  $this->mobile,
        //     'profile_image' =>url('http://localhost:8000/storage/profile/'.$this->profile_image),
        //     'roles'     =>  $this->getRoleNames(),
        //     'permissions' => $this->getAllPermissions()->pluck('name'),
        // ];

        return [
            'id'        =>  $this->id,
            'name'      =>  $this->name,
            'email'     =>  $this->email,
            'mobile'    =>  $this->mobile,
            'profile_image' =>url('http://localhost:8000/storage/profile/'.$this->profile_image),
            'roles' => $this->roles->pluck('id')->first(),
            'permissions' => $this->getAllPermissions()->pluck('name'),
        ];
    }
}
