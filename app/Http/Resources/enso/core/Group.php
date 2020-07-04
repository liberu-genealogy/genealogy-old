<?php

namespace App\Http\Resources\enso\core;

use Illuminate\Http\Resources\Json\JsonResource;

class Group extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
