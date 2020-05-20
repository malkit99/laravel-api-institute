<?php

namespace App\Http\Resources\Front\Team;

use Illuminate\Http\Resources\Json\JsonResource;

class OurTeamResource extends JsonResource
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
            'name' => $this->name,
            'post' => $this->post,
            'description' => $this->description,
            'facebook' => $this->facebook,
            'insta' => $this->insta,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
            'team_image' => url(env('APP_URL').'/storage/team/'.$this->team_image),
        ];
    }
}
