<?php

namespace App\Http\Controllers\Repositories;

use App\Repository;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateRepositoryRequest;

class Update extends Controller
{
    public function __invoke(ValidateRepositoryRequest $request, Repository $repository)
    {
        $repository->update($request->validated());

        return ['message' => __('The repository was successfully updated')];
    }
}
