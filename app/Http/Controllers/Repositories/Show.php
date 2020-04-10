<?php

namespace App\Http\Controllers\Repositories;

use App\Repository;
use Illuminate\Routing\Controller;

class Show extends Controller
{
    public function __invoke(Repository $repository)
    {
        return ['repository' => $repository];
    }
}
