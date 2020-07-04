<?php

namespace App\Http\Controllers\enso\Logs;

use Illuminate\Routing\Controller;
use LaravelEnso\Logs\Services\Collection;

class Index extends Controller
{
    public function __invoke()
    {
        return (new Collection())->get();
    }
}
