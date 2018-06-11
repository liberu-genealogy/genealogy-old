<?php

namespace App\Http\Controllers\Repository;

use App\Http\Controllers\Controller;
use App\Repository;
use LaravelEnso\Select\app\Traits\OptionsBuilder;

class RepositorySelectController extends Controller
{
    use OptionsBuilder;

    protected $model = Repository::class;

    protected $queryAttributes = [
        'name', 'description', 'date',
    ];
}
