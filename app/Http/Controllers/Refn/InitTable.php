<?php

namespace App\Http\Controllers\Refn;

use App\Tables\Builders\RefnTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = RefnTable::class;
}
