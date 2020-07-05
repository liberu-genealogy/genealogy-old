<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use App\Tables\Builders\enso\Localisation\LanguageTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = LanguageTable::class;
}
