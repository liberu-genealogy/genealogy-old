<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;
use App\Tables\Builders\enso\Tutorials\TutorialTable;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TutorialTable::class;
}
