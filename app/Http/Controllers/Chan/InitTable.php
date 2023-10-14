<?php

namespace App\Http\Controllers\Chan;

use App\Tables\Builders\ChanTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = ChanTable::class;
}
