<?php

namespace App\Models;

use LaravelEnso\Users\Models\User as CoreUser;
use Laravel\Cashier\Billable;

class User extends CoreUser
{
    use Billable;
}
