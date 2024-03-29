<?php

namespace App\Http\Controllers\Repositories;

use App\Tables\Builders\RepositoryTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = RepositoryTable::class;
}
