<?php

namespace App\Models;

use LaravelEnso\Core\Models\User as CoreUser;

class User extends CoreUser
{
    protected $fillable = ['person_id', 'group_id', 'role_id', 'email', 'is_active', 'email_verified_at', 'password'];
}
