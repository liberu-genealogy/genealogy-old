<?php

namespace App\Http\Controllers\Repositories;

use App\Repository;
use Illuminate\Routing\Controller;

class Destroy extends Controller
{
    public function __invoke(Repository $repository)
    {
        $repository->delete();

        return [
            'message' => __('The repository was successfully deleted'),
            'redirect' => 'repositories.index',
        ];
    }
}
