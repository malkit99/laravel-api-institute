<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class CourseByIdResource extends JsonResource
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
            'title' => $this->title,
            'course_name' => $this->course_name,
            'skill_level' => $this->skill_level,
            'status' => $this->status,
            'create' => $this->created_at->format('d-M-Y'),
            'course_image' => url('http://localhost:8000/storage/course/'.$this->course_image),
            'category' => $this->course_category()->pluck('id')->first(),
            'batch' => $this->batch()->pluck('id')->first(),
            'duration' => $this->duration()->pluck('id')->first(),
            'fee' => $this->course_fee()->pluck('id')->first(),
            'code' => $this->course_code()->pluck('id')->first(),
            'subjects' => SubjectResource::collection($this->subjects()->get()),

        ];
    }
}
