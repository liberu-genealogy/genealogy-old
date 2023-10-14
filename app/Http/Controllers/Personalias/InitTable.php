<?php

namespace App\Http\Controllers\Personalias;

use App\Tables\Builders\PersonAliaTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PersonAliaTable::class;
}
