<?php

namespace App\Http\Controllers\Families;

use App\Tables\Builders\FamilyTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = FamilyTable::class;
}
