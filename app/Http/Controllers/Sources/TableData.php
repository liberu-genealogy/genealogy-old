<?php

namespace App\Http\Controllers\Sources;

use App\Tables\Builders\SourceTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SourceTable::class;
}
