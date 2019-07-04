<?php

namespace App\Http\Controllers\Repository;

use App\repository;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidaterepositoryRequest;

class Store extends Controller
{
    public function __invoke(ValidaterepositoryRequest $request, repository $repository)
    {
        tap($repository)->fill($request->validated())
            ->save();

        return [
            'message' => __('The repository was successfully created'),
            'redirect' => 'repository.edit',
            'param' => ['repository' => $repository->id],
        ];
    }
}
