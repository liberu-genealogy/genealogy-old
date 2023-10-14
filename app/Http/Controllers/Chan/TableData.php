<?php

namespace App\Http\Controllers\Chan;

use App\Tables\Builders\ChanTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = ChanTable::class;
}
