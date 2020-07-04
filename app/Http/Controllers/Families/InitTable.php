<?php

namespace App\Http\Controllers\Families;

use App\Tables\Builders\FamilyTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = FamilyTable::class;
}
