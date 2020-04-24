<?php

namespace App\Http\Controllers\Publications;

use App\Tables\Builders\PublicationTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\App\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PublicationTable::class;
}
