<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Media extends JsonResource
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
            'name'    => $this->name,
            'type'    => $this->type,
            'url'     => $this->url,
            'size'    => $this->size,
            'user' => $this->user
        ];
    }
}
