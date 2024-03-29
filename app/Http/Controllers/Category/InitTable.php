<?php

namespace App\Http\Controllers\Category;

use App\Tables\Builders\CategoryTable;
use Illuminate\Routing\Controller;
use LaravelLiberu\Tables\Traits\Init;

class InitTable extends Controller
{
    use Init;

    protected $tableClass = CategoryTable::class;
}
