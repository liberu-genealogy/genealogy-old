<?php

namespace App\Http\Controllers\Familyslugs;

use App\Tables\Builders\FamilySlgsTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = FamilySlgsTable::class;
}
