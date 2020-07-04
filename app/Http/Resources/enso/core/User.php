<?php

namespace App\Http\Resources\enso\core;

use App\Http\Resources\enso\avatars\Avatar;
use App\Http\Resources\enso\people\Person;
use App\Http\Resources\enso\roles\Role;
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
            'id' => $this->id,
            'isActive' => $this->is_active,
            'email' => $this->email,
            'person' => new Person($this->whenLoaded('person')),
            'avatar' => new Avatar($this->whenLoaded('avatar')),
            'role' => new Role($this->whenLoaded('role')),
            'group' => new Group($this->whenLoaded('group')),
        ];
    }
}
