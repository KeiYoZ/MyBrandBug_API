<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PostResource extends Resource
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
            'type'          => 'posts',
            'id'            => (string)$this->id,
            'attributes'    => [
                'caption'   => $this->caption,
                'media'     => $this->media,
                'location'  => $this->location,
                'create_at' => $this->created_at
            ]
        ];
    }
}
