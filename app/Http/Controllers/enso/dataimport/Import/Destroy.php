<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\DataImport;
class Destroy extends Controller
{
    public function __invoke(DataImport $dataImport)
    {
        $dataImport->delete();

        return ['message' => __('The import record was successfully deleted')];
    }
}
