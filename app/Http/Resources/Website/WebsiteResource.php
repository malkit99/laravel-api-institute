<?php

namespace App\Http\Resources\Website;

use Illuminate\Http\Resources\Json\JsonResource;

class WebsiteResource extends JsonResource
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
            "id"                => $this->id,
            "title"             => $this->title,
            "email"             => $this->email,
            "mobile"            => $this->mobile,
            "mobile_2"          => $this->mobile_2,
            "facebook"          => $this->facebook,
            "insta"             => $this->insta,
            "twitter"           => $this->twitter,
            "linkedin"          => $this->linkedin,
            "address_line_1"    => $this->address_line_1,
            "address_line_2"    => $this->address_line_2,
            "state"             => $this->state,
            "city"              => $this->city,
            "district"          => $this->district,
            "pin_code"          => $this->pin_code,
            "logo"              => url(env('APP_URL').'/storage/logo/'.$this->logo),
         ];
    }
}
