<?php

namespace App\Http\Controllers\enso\Localisation\Language;

use App\Tables\Builders\enso\Localisation\LanguageTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = LanguageTable::class;
}
