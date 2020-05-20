<?php

namespace App\Http\Resources\Front\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class OurCategoryResource extends JsonResource
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
            "id" =>$this->id,
            "name"  =>$this->name,
            "slug"  =>$this->slug,
            "description" =>$this->description,
        ];
    }
}
