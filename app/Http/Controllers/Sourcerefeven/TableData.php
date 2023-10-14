<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Tables\Builders\SourceRefEvenTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = SourceRefEvenTable::class;
}
