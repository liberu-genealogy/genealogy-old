<?php

namespace App\Http\Controllers\Sourcedataevent;

use App\Tables\Builders\SourceDataEvenTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SourceDataEvenTable::class;
}
