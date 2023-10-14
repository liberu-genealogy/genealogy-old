<?php

namespace App\Http\Controllers\Topic;

use App\Tables\Builders\TopicTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Excel;

class ExportExcel extends Controller
{
    use Excel;

    protected string $tableClass = TopicTable::class;
}
