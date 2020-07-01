<?php

namespace App\Http\Controllers\Personasso;

use App\Tables\Builders\PersonAssoTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonAssoTable::class;
}
