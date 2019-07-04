<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidaterepositoryRequest;

class Update extends Controller
{
    public function __invoke(ValidaterepositoryRequest $request, repository $repository)
    {
        $repository->update($request->validated());

        return ['message' => __('The repository was successfully updated')];
    }
}
