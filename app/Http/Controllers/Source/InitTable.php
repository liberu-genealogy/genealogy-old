<?php

namespace App\Http\Controllers\Source;

use App\Tables\Builders\sourceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = sourceTable::class;
}
