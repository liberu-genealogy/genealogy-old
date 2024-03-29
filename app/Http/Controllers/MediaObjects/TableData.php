<?php

namespace App\Http\Controllers\MediaObjects;

use App\Tables\Builders\MediaObjectTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = MediaObjectTable::class;
}
