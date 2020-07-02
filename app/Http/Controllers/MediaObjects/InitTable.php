<?php

namespace App\Http\Controllers\MediaObjects;

use App\Tables\Builders\MediaObjectTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = MediaObjectTable::class;
}
