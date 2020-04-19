<?php

namespace App\Http\Resources\Testimonial;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialResource extends JsonResource
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
            'designation' => $this->designation,
            'description' => $this->description,
            'status' => $this->status,
            'testi_image' => url('http://localhost:8000/storage/testimonial/'.$this->testi_image),
            'create_date' => $this->created_at->format('d-M-Y'),
        ];
    }
}
