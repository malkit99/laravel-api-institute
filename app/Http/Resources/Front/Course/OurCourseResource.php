<?php

namespace App\Http\Resources\Front\Course;

use App\Http\Resources\Course\SubjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OurCourseResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'course_name' => $this->course_name,
            'slug' => $this->slug,
            'certificate' => $this->certificate == 1 ? "Yes" : "No",
            'instructor' => $this->certified_instructor == 1 ? "Yes" : "No",
            'training' => $this->pratical_training == 1 ? "Yes" : "No",
            'popular_course' => $this->popular_course == 1 ? "Popular Course" : "No",
            'course_image' => url(env('APP_URL').'/storage/course/'.$this->course_image),
            'category' => $this->course_category()->pluck('name')->first(),
            'batch' => $this->batch()->pluck('batch_size')->first(),
            'duration' => $this->duration()->pluck('duration')->first(),
            'fee' => $this->course_fee()->pluck('course_fee')->first(),
            'code' => $this->course_code()->pluck('course_code')->first(),
            'subjects' => SubjectResource::collection($this->subjects()->get()),
        ];
    }
}
