<?php

namespace App\Http\Controllers\Person;

use App\Tables\Builders\PersonTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected $tableClass = PersonTable::class;
}
