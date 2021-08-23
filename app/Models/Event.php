<?php

namespace App\Models;

use LaravelEnso\Calendar\Models\Event as CoreEvent;
use LaravelEnso\Multitenancy\Traits\SystemConnection;

class Event extends CoreEvent
{
    use SystemConnection;
}
