<?php

namespace App\Http\Controllers\Repositories;

use App\Tables\Builders\RepositoryTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = RepositoryTable::class;
}
