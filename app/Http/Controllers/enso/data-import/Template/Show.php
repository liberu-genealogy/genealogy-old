<?php

namespace App\Http\Controllers\enso\dataimport\Template;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\ImportTemplate;

class Show extends Controller
{
    public function __invoke(string $type)
    {
        return ['template' => ImportTemplate::whereType($type)->first()];
    }
}
