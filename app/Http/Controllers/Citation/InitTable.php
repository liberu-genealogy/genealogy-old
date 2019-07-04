<?php

namespace App\Http\Controllers\Citation;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CitationTable::class;
}
