<?php

namespace App\Models;

use LaravelEnso\Companies\Models\Company as CoreCompany;
use LaravelEnso\Multitenancy\Traits\SystemConnection;

class Company extends CoreCompany
{
    use SystemConnection;
}
