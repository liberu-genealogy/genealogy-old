<?php

namespace App\Http\Controllers\DnaMatching;

use App\Tables\Builders\DnaMatchingTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = DnaMatchingTable::class;
}
