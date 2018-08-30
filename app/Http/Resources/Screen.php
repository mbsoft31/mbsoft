<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Screen extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'resoulution' => $this->resoulution,
            'location' => $this->location,
            'gallery_id' => $this->gallery_id,
            'user_id' => $this->user_id
        ];
    }
}
