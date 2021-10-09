<?php

namespace App\Http\Controllers\Dna;

use App\Tables\Builders\DnaTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = DnaTable::class;
}
