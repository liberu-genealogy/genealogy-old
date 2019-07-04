<?php

namespace App\Http\Controllers\Repository;

use App\Tables\Builders\repositoryTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = repositoryTable::class;
}
