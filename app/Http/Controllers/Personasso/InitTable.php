<?php

namespace App\Http\Controllers\Personasso;

use App\Tables\Builders\PersonAssoTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonAssoTable::class;
}
