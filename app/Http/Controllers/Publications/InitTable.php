<?php

namespace App\Http\Controllers\Publications;

use App\Tables\Builders\PublicationTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected string $tableClass = PublicationTable::class;
}
