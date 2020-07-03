<?php

namespace App\Http\Controllers\Personlds;

use App\Tables\Builders\PersonLdsTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PersonLdsTable::class;
}
