<?php

namespace App\Http\Controllers\enso\teams;

use App\Models\enso\teams\Team;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected $model = Team::class;
}
