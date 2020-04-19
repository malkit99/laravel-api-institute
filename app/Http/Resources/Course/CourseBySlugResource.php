<?php

namespace App\Http\Resources\Course;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseBySlugResource extends JsonResource
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
            'certificate' => $this->certificate,
            'instructor' => $this->certified_instructor,
            'training' => $this->pratical_training,
            'status' => $this->status,
            'create' => $this->created_at->format('d-M-Y'),
            'course_image' => url('http://localhost:8000/storage/course/'.$this->course_image),
            'category' => $this->course_category()->pluck('name')->first(),
            'batch' => $this->batch()->pluck('batch_size')->first(),
            'duration' => $this->duration()->pluck('duration')->first(),
            'fee' => $this->course_fee()->pluck('course_fee')->first(),
            'code' => $this->course_code()->pluck('course_code')->first(),
            'subjects' => SubjectResource::collection($this->subjects()->get()),

        ];

    }
}
