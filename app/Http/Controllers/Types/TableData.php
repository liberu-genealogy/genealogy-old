<?php

namespace App\Http\Controllers\Types;

use App\Tables\Builders\TypeTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TypeTable::class;
}
