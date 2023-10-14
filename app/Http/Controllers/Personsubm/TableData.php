<?php

namespace App\Http\Controllers\Personsubm;

use App\Tables\Builders\PersonSubmTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonSubmTable::class;
}
