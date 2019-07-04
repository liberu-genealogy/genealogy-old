<?php

namespace App\Http\Controllers\Source;

use Illuminate\Routing\Controller;
use App\Tables\Builders\sourceTable;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = sourceTable::class;
}
