<?php

namespace App\Http\Controllers\Citations;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = CitationTable::class;
}
