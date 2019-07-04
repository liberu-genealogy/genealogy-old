<?php

namespace App\Http\Controllers\Citation;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = CitationTable::class;
}
