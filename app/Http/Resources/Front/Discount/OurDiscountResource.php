<?php

namespace App\Http\Resources\Front\Discount;

use Illuminate\Http\Resources\Json\JsonResource;

class OurDiscountResource extends JsonResource
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
            'title' => $this->discount_title,
            'description' => $this->description,
            'discount' => $this->discount,
            'last' => $this->last_date->format('d-M-Y'),
            'discount_image' => url(env('APP_URL').'/storage/discount/'.$this->discount_image)
        ];

    }
}
