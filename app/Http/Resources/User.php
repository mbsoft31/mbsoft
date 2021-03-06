<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'full_name' => $this->name,
            'email' => $this->email,
            'roles' => $this->roles,
            'metas' => $this->metas,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
