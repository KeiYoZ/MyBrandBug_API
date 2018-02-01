<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserDetailsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'full_name'     => $this->fname . ' ' . $this->lname,
            'email'         => $this->email,
            'birthday'      => $this->birthday,
            'gender'        => $this->gender,
            'affiliation'   => $this->affiliation,
            'occupation'    => $this->occupation,
            'state'         => $this->state,
            'country'       => $this->country,
            'summary'       => $this->summary,
            'image_path'    => $this->image_path
        ];
    }
}
