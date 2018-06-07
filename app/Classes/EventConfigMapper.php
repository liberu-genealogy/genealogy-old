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
        $event = config('events.event.'.$this->type);

        if (!$event) {
            throw new EventConfigException(__(
                'Entity :entity does not exist in events.php config file',
                ['entity' => $this->type]
            ));
        }

        return $event;
    }
}
