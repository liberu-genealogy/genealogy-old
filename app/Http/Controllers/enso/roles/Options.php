<?php

namespace App\Http\Controllers\enso\Roles;

use Illuminate\Routing\Controller;
use App\Models\enso\Roles\Role;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    public function query()
    {
        return Role::visible();
    }
}
