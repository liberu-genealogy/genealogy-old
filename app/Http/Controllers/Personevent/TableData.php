<?php

namespace App\Http\Controllers\Personevent;

use App\Tables\Builders\PersonEventTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonEventTable::class;
}
