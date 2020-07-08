<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\DataImport;

class Download extends Controller
{
    public function __invoke(DataImport $dataImport)
    {
        return $dataImport->download();
    }
}
