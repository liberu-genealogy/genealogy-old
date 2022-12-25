<?php

namespace App\Models;

use App\Traits\CreatedBy;
use App\Traits\TenantConnectionResolver;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Companies\Models\Company as CoreCompany;

class Company extends CoreCompany
{
    use CreatedBy;
}
