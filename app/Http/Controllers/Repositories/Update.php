<?php

namespace App\Http\Controllers\Repositories;

use App\Http\Requests\ValidateRepositoryRequest;
use App\Models\Repository;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateRepositoryRequest $request, Repository $repository)
    {
        $repository->update($request->validated());

        return ['message' => __('The repository was successfully updated')];
    }
}
