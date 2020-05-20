<?php

namespace App\Http\Resources\Front\Testimonial;

use Illuminate\Http\Resources\Json\JsonResource;

class OurTestimonialResource extends JsonResource
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
            'student' => $this->student,
            'designation' => $this->designation,
            'description' => $this->description,
            'testi_image' => url(env('APP_URL').'/storage/testimonial/'.$this->testi_image),
        ];
    }
}
