<?php

namespace App\Classes;

use LaravelEnso\Contacts\app\Exceptions\ContactConfigException;

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
            throw new ContactConfigException(__(
                'Entity :entity does not exist in enso/events.php config file',
                ['entity' => $this->type]
            ));
        }

        return $event;
    }
}
