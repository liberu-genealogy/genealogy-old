<?php

namespace App\Http\Controllers\Category;

use App\Tables\Builders\CategoryTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = CategoryTable::class;
}
