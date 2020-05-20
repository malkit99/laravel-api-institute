<?php

namespace App\Http\Resources\Front\Slider;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderImageResource extends JsonResource
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
            'title' => $this->title,
            'slider_image' => url(env('APP_URL').'/storage/slider/'.$this->slider_image),
        ];
    }
}
