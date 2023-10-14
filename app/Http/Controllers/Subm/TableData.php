<?php

namespace App\Http\Controllers\Subm;

use App\Tables\Builders\SubmTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SubmTable::class;
}
