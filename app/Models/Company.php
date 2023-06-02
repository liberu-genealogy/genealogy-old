<?php

namespace App\Models;

use App\Traits\CreatedBy;
use LaravelEnso\Companies\Models\Company as CoreCompany;

class Company extends CoreCompany
{
    use CreatedBy;

    protected $fillable = [
        'privacy',
        'name',
        'email',
        'is_tenant',
        'status',
    ];
}
