<?php

namespace App\Http\Resources\Front\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseByCategorySlugResource extends JsonResource
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
            'course_name' => $this->course_name,
            'title' => $this->title,
            'slug' => $this->slug,
            'skill_level' => $this->skill_level,
            'course_image' => url(env('APP_URL').'/storage/course/'.$this->course_image),
        ];
    }
}
