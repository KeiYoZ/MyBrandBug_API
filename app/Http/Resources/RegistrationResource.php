<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RegistrationResource extends Resource
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
            'fname'     => $this->fname,
            'lname'     => $this->lname,
            'email'     => $this->email,
            'birthday'  => $this->birthday,
            'gender'    => $this->gender
        ];
    }

    public function with($request){

        return [
            'success' => 'true',
            'message' => 'Registration Successful',
        ];

    }
}
