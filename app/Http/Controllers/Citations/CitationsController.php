<?php

namespace App\Http\Controllers\Citations;

use App\Citations;
use App\Forms\Builders\CitationsForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateCitationsRequest;


class CitationsController extends Controller
{
    public function create(CitationsForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateCitationsRequest $request)
    {
        $citations = Citations::create($request->all());

        return [
            'message' => __('The citations was successfully created'),
            'redirect' => 'citations.edit',
            'param' => ['citations' => $citations->id],
        ];
    }

    public function show(Citations $citations)
    {
        return ['citations' => $citations];
    }

    public function edit(Citations $citations, CitationsForm $form)
    {
        return ['form' => $form->edit($citations)];
    }

    public function update(ValidateCitationsRequest $request, Citations $citations)
    {
        $citations->update($request->all());

        return ['message' => __('The citations was successfully updated')];
    }

    public function destroy(Citations $citations)
    {
        $citations->delete();

        return [
            'message' => __('The citations was successfully deleted'),
            'redirect' => 'citations.index',
        ];
    }
}
