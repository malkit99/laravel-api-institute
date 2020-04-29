<?php

namespace App\Http\Resources\JobOpportunity;

use Illuminate\Http\Resources\Json\JsonResource;

class JobOpportunityResource extends JsonResource
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
            'company_name' => $this->company_name,
            'status' => $this->status,
            'publish_at' => $this->created_at->format('Y-m-d'),
            'job_image' => url('http://localhost:8000/storage/job/'.$this->job_image),
        ];
    }
}
