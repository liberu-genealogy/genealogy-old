<?php

namespace App\Http\Controllers\Citation;

use Illuminate\Routing\Controller;
use App\Tables\Builders\CitationTable;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CitationTable::class;
}
