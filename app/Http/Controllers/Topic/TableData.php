<?php

namespace App\Http\Controllers\Topic;

use App\Tables\Builders\TopicTable;
use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Data;

class TableData extends Controller
{
    use Data;

    protected string $tableClass = TopicTable::class;
}
