<?php

namespace App\Http\Controllers\Personevent;

use App\Tables\Builders\PersonEventTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonEventTable::class;
}
