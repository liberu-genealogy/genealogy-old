<?php

namespace App\Http\Controllers\enso\Tutorials;

use Illuminate\Routing\Controller;
use LaravelEnso\Tables\Traits\Excel;
use App\Tables\Builders\enso\Tutorials\TutorialTable;
class ExportExcel extends Controller
{
    use Excel;

    protected $tableClass = TutorialTable::class;
}
