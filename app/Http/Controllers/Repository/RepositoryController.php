<?php

namespace App\Http\Controllers\Repository;

use App\Repository;
use App\Forms\Builders\RepositoryForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateRepositoryRequest;


class RepositoryController extends Controller
{
    public function create(RepositoryForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateRepositoryRequest $request)
    {
        $repository = new Repository($request->all());

        $repository->save();

        return [
            'message' => __('The repository was successfully created'),
            'redirect' => 'repository.edit',
            'param' => ['repository' => $repository->id],
        ];
    }

    public function show(Repository $repository)
    {
        return ['repository' => $repository];
    }

    public function edit(Repository $repository, RepositoryForm $form)
    {
        return ['form' => $form->edit($repository)];
    }

    public function update(ValidateRepositoryRequest $request, Repository $repository)
    {
        $repository->fill($request->all());

        $repository->save();

        return ['message' => __('The repository was successfully updated')];
    }

    public function destroy(Repository $repository)
    {
        $repository->delete();

        return [
            'message' => __('The repository was successfully deleted'),
            'redirect' => 'repository.index',
        ];
    }
}
