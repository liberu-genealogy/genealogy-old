<?php

namespace App\Http\Controllers\enso\Roles;

use App\Models\enso\Roles\Role;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    public function query()
    {
        return Role::visible();
    }
}
