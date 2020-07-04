<?php

namespace App\Http\Controllers\enso\teams;

use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;
use App\Models\enso\teams\Team;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Team::class;
}
