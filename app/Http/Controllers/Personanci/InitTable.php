<?php

namespace App\Http\Controllers\Personanci;

use App\Tables\Builders\PersonAnciTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonAnciTable::class;
}
