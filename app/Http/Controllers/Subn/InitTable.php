<?php

namespace App\Http\Controllers\Subn;

use App\Tables\Builders\SubnTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SubnTable::class;
}
