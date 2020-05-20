<?php

namespace App\Http\Resources\Front\Job;

use Illuminate\Http\Resources\Json\JsonResource;

class OurJobResource extends JsonResource
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
            'company' => $this->company_name,
            'job_image' => url(env('APP_URL').'/storage/job/'.$this->job_image),
        ];
    }
}
