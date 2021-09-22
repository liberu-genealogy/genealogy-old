<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use LaravelEnso\Users\Models\User as CoreUser;

class User extends CoreUser
{
    use Billable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'person_id',
        'group_id',
        'role_id',
        'is_active'
    ];
}
