<?php

namespace App\Http\Controllers\Category;

use App\Models\Category;
use Illuminate\Routing\Controller;
use LaravelEnso\Select\Traits\OptionsBuilder;

class Options extends Controller
{
    use OptionsBuilder;

    protected string $model = Category::class;

    protected $queryAttributes = ['name'];
}
