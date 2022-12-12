<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use LaravelEnso\Calendar\Models\Event as CoreEvent;

class Event extends CoreEvent
{
    use TenantConnectionResolver;
}
