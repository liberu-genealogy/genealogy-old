<?php

namespace App\Http\Controllers\Citations;

use App\Tables\Builders\CitationTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = CitationTable::class;
}
