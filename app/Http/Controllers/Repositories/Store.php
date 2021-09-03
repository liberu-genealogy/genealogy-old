<?php

namespace App\Http\Controllers\Repositories;

use App\Http\Requests\ValidateRepositoryRequest;
use App\Models\Repository;
use Illuminate\Routing\Controller;

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
