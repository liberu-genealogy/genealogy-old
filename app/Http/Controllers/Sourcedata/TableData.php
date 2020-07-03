<?php

namespace App\Http\Controllers\Sourcedata;

use App\Tables\Builders\SourceDataTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SourceDataTable::class;
}
