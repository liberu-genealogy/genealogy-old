<?php

namespace App\Http\Resources\enso\people;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;
use LaravelEnso\People\Enums\Titles;

class Person extends JsonResource
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
            'appellative' => $this->appellative,
            'birthday' => optional($this->birthday)->format(Config::get('config.enso.dateFormat')),
            'title' => Titles::get($this->title),
            'phone' => $this->phone,
        ];
    }
}
