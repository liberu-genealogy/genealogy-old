<?php

namespace App\Http\Controllers\enso\dataimport\Template;

use Illuminate\Routing\Controller;
use App\Models\enso\dataimport\ImportTemplate;

class Destroy extends Controller
{
    public function __invoke(ImportTemplate $importTemplate)
    {
        $importTemplate->delete();

        return ['message' => __('The template was successfully deleted')];
    }
}
