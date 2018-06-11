<?php

namespace App\Http\Controllers\Administration\User;

use App\Http\Controllers\Controller;
use App\User;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class UserSelectController extends Controller
{
    use OptionsBuilder;

    protected $queryAttributes = ['first_name', 'last_name', 'email', 'phone'];

    public function query()
    {
        return User::active();
    }
}
