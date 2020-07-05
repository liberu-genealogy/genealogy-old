<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use LaravelEnso\DataImport\Enums\ImportTypes;

class Index extends Controller
{
    public function __invoke()
    {
        return ['types' => ImportTypes::select()];
    }
}
