<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(repository $repository)
    {
        return ['repository' => $repository];
    }
}
