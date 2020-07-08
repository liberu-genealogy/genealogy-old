<?php

namespace App\Http\Controllers\enso\dataimport\Template;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\ImportTemplate;

class Download extends Controller
{
    public function __invoke(ImportTemplate $importTemplate)
    {
        return $importTemplate->download();
    }
}
