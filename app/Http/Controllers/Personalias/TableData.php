<?php

namespace App\Http\Controllers\Personalias;

use App\Tables\Builders\PersonAliaTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonAliaTable::class;
}
