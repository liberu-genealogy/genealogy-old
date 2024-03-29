<?php

namespace App\Http\Controllers\Authors;

use App\Tables\Builders\AuthorTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = AuthorTable::class;
}
