<?php

namespace App\Http\Controllers\enso\dataimport\Import;

use Illuminate\Routing\Controller;
use LaravelEnso\DataImport\Http\Requests\ValidateImportRequest;
use App\Models\enso\dataimport\DataImport;

class Store extends Controller
{
    public function __invoke(ValidateImportRequest $request)
    {
        $dataImport = factory(DataImport::class)
            ->make(['type' => $request->get('type')]);

        return $dataImport->handle(
            $request->file('import'),
            $request->except(['import', 'type'])
        );
    }
}
