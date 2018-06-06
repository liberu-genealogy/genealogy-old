<?php
namespace App\Traits;

use App\Event;

trait EventTrait
{
    public function events()
    {
        return $this->morphMany(Event::class, 'event');
    }
}