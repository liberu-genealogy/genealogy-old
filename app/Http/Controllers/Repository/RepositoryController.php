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
            'message' => __('The Repository was successfully created'),
            'redirect' => 'repositorys.edit',
            'id' => $repository->id,
        ];
    }

    public function show(Repository $repository)
    {
        return ['Repository' => $repository];
    }

    public function edit(Repository $repository, RepositoryForm $form)
    {
        return ['form' => $form->edit($repository)];
    }

    public function update(ValidateRepositoryRequest $request, Repository $repository)
    {
        $repository->fill($request->all());

        $repository->save();

        return ['message' => __('The Repository was successfully updated')];
    }

    public function destroy(Repository $repository)
    {
        $repository->delete();

        return [
            'message' => __('The Repository was successfully deleted'),
            'redirect' => 'repositorys.index',
        ];
    }
}
