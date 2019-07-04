<?php

namespace App\Http\Controllers\Repository;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\app\Traits\Init;
use App\Tables\Builders\repositoryTable;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = repositoryTable::class;
}
