<?php

namespace App\Http\Controllers\Publications;

use App\Tables\Builders\PublicationTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = PublicationTable::class;
}
