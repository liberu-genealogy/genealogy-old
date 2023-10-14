<?php

namespace App\Http\Controllers\Subn;

use App\Tables\Builders\SubnTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SubnTable::class;
}
