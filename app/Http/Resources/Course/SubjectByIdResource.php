<?php

namespace App\Http\Resources\Course;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectByIdResource extends JsonResource
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
        $defaultData = [
            'id' => $this->id,
            'subject_name' => $this->subject_name,
        ];

        $additionalData = [
             'contents' =>  ContentResource::collection($this->contents()->get()),
        ];

        return array_merge($defaultData, $additionalData);
    }
}
