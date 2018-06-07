<?php

namespace App\Classes;

use App\Exceptions\EventConfigException;

class EventConfigMapper
{
    private $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function class()
    {
        $events = config('enso.events.events.'.$this->type);

        if (!$event) {
            throw new EventConfigException(__(
                'Entity :entity does not exist in enso/events.php config file',
                ['entity' => $this->type]
            ));
        }

        return $event;
    }
}
