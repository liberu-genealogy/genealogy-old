<?php

namespace App\Http\Controllers\Refn;

use App\Tables\Builders\RefnTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = RefnTable::class;
}
