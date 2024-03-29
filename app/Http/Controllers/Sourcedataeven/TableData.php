<?php

namespace App\Http\Controllers\Sourcedataeven;

use App\Tables\Builders\SourceDataEvenTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SourceDataEvenTable::class;
}
