<?php

namespace App\Http\Resources\enso\Teams;

use App\Http\Resources\enso\core\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Team extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'userIds' => $this->userIds(),
            'users' => User::collection($this->whenLoaded('users')),
            'edit' => false,
        ];
    }
}
