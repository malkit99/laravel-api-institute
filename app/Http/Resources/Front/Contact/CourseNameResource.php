<?php

namespace App\Http\Resources\Front\Contact;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
