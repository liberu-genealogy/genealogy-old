<?php

namespace App\Http\Controllers\Familyevents;

use App\Tables\Builders\FamilyEventTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = FamilyEventTable::class;
}
