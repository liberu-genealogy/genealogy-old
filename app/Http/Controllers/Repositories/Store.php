<?php

namespace App\Http\Controllers\Repositories;

use App\Repository;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateRepositoryRequest;

class Store extends Controller
{
    public function __invoke(ValidateRepositoryRequest $request, Repository $repository)
    {
        $repository->fill($request->validated())->save();

        return [
            'message' => __('The repository was successfully created'),
            'redirect' => 'repositories.edit',
            'param' => ['repository' => $repository->id],
        ];
    }
}
