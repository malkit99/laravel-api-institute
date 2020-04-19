<?php

namespace App\Http\Resources\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
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
            'name' => $this->name,
            'facebook' => $this->facebook,
            'insta' => $this->insta,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'description' => $this->description,
            'post' => $this->post,
            'team_image' => url('http://localhost:8000/storage/team/'.$this->team_image),

        ];
    }
}
