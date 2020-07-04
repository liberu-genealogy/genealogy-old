<?php

namespace App\Http\Controllers\enso\Teams;

use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;
use App\Models\enso\Teams\Team;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Team::class;
}
