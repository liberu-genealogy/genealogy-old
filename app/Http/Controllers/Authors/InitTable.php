<?php

namespace App\Http\Controllers\Authors;

use App\Tables\Builders\AuthorTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = AuthorTable::class;
}
