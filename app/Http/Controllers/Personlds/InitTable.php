<?php

namespace App\Http\Controllers\Personlds;

use App\Tables\Builders\PersonLdsTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonLdsTable::class;
}
