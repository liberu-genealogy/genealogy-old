<?php
namespace App\Traits;

use App\Event;

trait Events
{
    public function events()
    {
        return $this->morphMany(Event::class, 'events');
    }
}