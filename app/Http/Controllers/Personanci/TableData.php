<?php

namespace App\Http\Controllers\Personanci;

use App\Tables\Builders\PersonAnciTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonAnciTable::class;
}
