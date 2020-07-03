<?php

namespace App\Http\Controllers\enso\core;

use App\Http\Response\enso\core\AppState;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;

class Spa extends Controller
{

    public function __invoke()
    {
        return App::make(AppState::class);
    }
}
