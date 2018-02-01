<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class AccessTokenResource extends Resource
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
            'token_type'    => 'Bearer',
            'expires_in'    => $this->expires_in,
            'access_token'  => $this->access_token,
            'refresh_token' => $this->refresh_token
        ];
    }
}
