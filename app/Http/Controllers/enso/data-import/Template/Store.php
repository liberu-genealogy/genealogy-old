<?php

namespace App\Http\Controllers\enso\dataimport\Template;

use Illuminate\Routing\Controller;
use LaravelEnso\DataImport\Http\Requests\ValidateTemplateRequest;
use App\Models\enso\dataimport\ImportTemplate;

class Store extends Controller
{
    public function __invoke(ValidateTemplateRequest $request, ImportTemplate $importTemplate)
    {
        $importTemplate->type = $request->get('type');
        $importTemplate->store($request->file('template'));

        return ['template' => $importTemplate];
    }
}
