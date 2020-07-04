<?php

namespace App\Http\Controllers\enso\Logs;

use Illuminate\Routing\Controller;
use LaravelEnso\Logs\Services\Presenter;

class Show extends Controller
{
    public function __invoke(string $filename)
    {
        return (new Presenter($filename))->get();
    }
}
