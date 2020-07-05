<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;
use App\Tables\Builders\enso\Tutorials\TutorialTable;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = TutorialTable::class;
}
