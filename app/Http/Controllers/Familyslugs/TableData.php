<?php

namespace App\Http\Controllers\Familyslugs;

use App\Tables\Builders\FamilySlgsTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = FamilySlgsTable::class;
}
