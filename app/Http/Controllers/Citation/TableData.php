<?php

namespace App\Http\Controllers\Citation;

use Illuminate\Routing\Controller;
use App\Tables\Builders\CitationTable;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CitationTable::class;
}
