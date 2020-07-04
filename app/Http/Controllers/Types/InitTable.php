<?php

namespace App\Http\Controllers\Types;

use App\Tables\Builders\TypeTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = TypeTable::class;
}
