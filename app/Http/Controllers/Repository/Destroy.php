<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(repository $repository)
    {
        $repository->delete();

        return [
            'message' => __('The repository was successfully deleted'),
            'redirect' => 'repository.index',
        ];
    }
}
