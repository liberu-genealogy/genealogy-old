<?php

namespace App\Http\Controllers\Topic;

use App\Tables\Builders\TopicTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = TopicTable::class;
}
