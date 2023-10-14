<?php

namespace App\Http\Controllers\Sourcerefeven;

use App\Tables\Builders\SourceRefEvenTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = SourceRefEvenTable::class;
}
