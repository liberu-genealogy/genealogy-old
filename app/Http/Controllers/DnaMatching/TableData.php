<?php

namespace App\Http\Controllers\DnaMatching;

use App\Tables\Builders\DnaMatchingTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = DnaMatchingTable::class;
}
