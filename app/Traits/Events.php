<?php

namespace App\Traits;

use App\Event;

trait Events
{
    public function events()
    {
        return $this->morphToMany(Event::class, 'event');
    }
}
