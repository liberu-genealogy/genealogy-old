<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;
use App\Tables\Builders\repositoryTable;

class TableData extends Controller
{
    use Data;

    protected $tableClass = repositoryTable::class;
}
