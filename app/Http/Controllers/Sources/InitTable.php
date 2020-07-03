<?php

namespace App\Http\Controllers\Sources;

use App\Tables\Builders\SourceTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SourceTable::class;
}
