<?php

namespace App\Http\Controllers\Repository;

use App\Tables\Builders\repositoryTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = repositoryTable::class;
}
