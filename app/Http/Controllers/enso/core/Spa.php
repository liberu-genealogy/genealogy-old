<?php

namespace App\Http\Controllers\enso\core;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use App\Http\Response\enso\core\AppState;

class Spa extends Controller
{
    public function __invoke()
    {
        return App::make(AppState::class);
    }
}
