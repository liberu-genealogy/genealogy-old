<?php

namespace App\Models;

use LaravelEnso\People\Models\Person as CorePerson;
use LaravelEnso\Multitenancy\Traits\SystemConnection;

class Person extends CorePerson
{
    use SystemConnection;
}
