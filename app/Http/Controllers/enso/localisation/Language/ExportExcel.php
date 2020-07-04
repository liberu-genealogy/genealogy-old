<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use Illuminate\Routing\Controller;
use App\Tables\Builders\enso\Localisation\LanguageTable;
use LaravelEnso\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = LanguageTable::class;
}
