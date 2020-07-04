<?php

namespace App\Http\Controllers\Subm;

use App\Tables\Builders\SubmTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SubmTable::class;
}
