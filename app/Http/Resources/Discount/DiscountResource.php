<?php

namespace App\Http\Resources\Discount;

use App\Http\Resources\Course\CourseAllNameResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
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
            'discount_title' => $this->discount_title,
            'discount' => $this->discount,
            'description' => $this->description,
            'status' => $this->status,
            'last_date' => $this->last_date->format('Y-m-d'),
            'course_id' => $this->course_id,
            'course_name' => $this->course()->pluck('course_name')->first(),
            'discount_image' => url(env('APP_URL').'/storage/discount/'.$this->discount_image),
        ];
    }
}
