<?php

namespace App\Http\Resources\enso\files;

use App\Http\Resources\enso\core\User;
use Illuminate\Http\Resources\Json\JsonResource;

class File extends JsonResource
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
            'name' => $this->original_name,
            'size' => $this->size,
            'mimeType' => $this->mime_type,
            'type' => $this->type(),
            'owner' => new User($this->whenLoaded('createdBy')),
            'isDestroyable' => $this->destroyableBy($request->user()),
            'isShareable' => $this->shareableBy($request->user()),
            'isViewable' => $this->viewableBy($request->user()),
            'createdAt' => $this->created_at->toDatetimeString(),
        ];
    }
}
