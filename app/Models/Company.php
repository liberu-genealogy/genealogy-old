<?php

namespace App\Models;

use App\Traits\TenantConnectionResolver;
use LaravelEnso\Companies\Models\Company as CoreCompany;

class Company extends CoreCompany
{
    use TenantConnectionResolver;
}
