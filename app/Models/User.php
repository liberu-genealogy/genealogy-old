<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use LaravelEnso\Users\Models\User as CoreUser;

class User extends CoreUser
{
    use Billable;
}
