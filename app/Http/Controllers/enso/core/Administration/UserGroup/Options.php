<?php

namespace App\Http\Controllers\enso\core\Administration\UserGroup;

use App\Models\enso\core\UserGroup;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    public function query()
    {
        return UserGroup::visible();
    }
}
