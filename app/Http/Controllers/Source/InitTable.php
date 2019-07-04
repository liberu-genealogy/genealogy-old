<?php

namespace App\Http\Controllers\Source;

use Illuminate\Routing\Controller;
use App\Tables\Builders\sourceTable;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = sourceTable::class;
}
