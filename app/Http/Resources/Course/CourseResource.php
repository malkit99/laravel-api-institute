<?php

namespace App\Http\Resources\Course;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'course_name' => $this->course_name,
            'slug' => $this->slug,
            'status' => $this->status,
            'popular_course' => $this->popular_course,
            'create' => $this->created_at->format('d-M-Y'),
            'course_image' => url(env('APP_URL').'/storage/course/'.$this->course_image),
            'category' => new CategoryResource($this->course_category()->first()),
        ];
    }
}
