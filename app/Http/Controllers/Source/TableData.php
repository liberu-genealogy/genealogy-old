<?php

namespace App\Http\Controllers\Source;

use App\Tables\Builders\sourceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = sourceTable::class;
}
