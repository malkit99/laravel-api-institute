<?php

namespace App\Http\Resources\Front\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseContentBySlugResource extends JsonResource
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
            'topic' => $this->topic_name,
            'description' => $this->topic_description,
        ];

    }
}
