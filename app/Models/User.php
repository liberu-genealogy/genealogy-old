<?php

namespace App\Models;

use LaravelEnso\Comments\App\Traits\Comments;
use LaravelEnso\Core\App\Models\User as CoreUser;
use LaravelEnso\Discussions\App\Traits\Discussions;
use LaravelEnso\Discussions\App\Traits\Replies;

class User extends CoreUser
{
    use Comments, Discussions, Replies;
    protected $hidden = ['password', 'remember_token', 'password_updated_at'];

    protected $fillable = ['person_id', 'group_id', 'role_id', 'email', 'is_active','email_verified_at','password'];
}
