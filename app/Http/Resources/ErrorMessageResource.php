<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ErrorMessageResource extends Resource
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
            'error_type'    => 'error 1',
            'error_message' =>  'An error has occured. Try again.'
        ];
    }
}
