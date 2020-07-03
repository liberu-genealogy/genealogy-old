<?php

namespace App\Http\Controllers\Subm;

use App\Tables\Builders\SubmTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SubmTable::class;
}
