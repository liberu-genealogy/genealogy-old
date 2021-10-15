<?php

namespace App\Http\Controllers\Dna;

use App\Tables\Builders\DnaTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = DnaTable::class;
}
