<?php

namespace App\Http\Controllers\Individual;

use App\Individual;
use App\Http\Controllers\Controller;
use App\Forms\Builders\IndividualForm;
use App\Http\Requests\ValidateIndividualRequest;

class IndividualController extends Controller
{
    public function create(IndividualForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateIndividualRequest $request)
    {
        $individual = new Individual($request->all());

        $individual->save();

        return [
            'message' => __('The Individual was successfully created'),
            'redirect' => 'individuals.edit',
            'id' => $individual->id,
        ];
    }

    public function show(Individual $individual)
    {
        return ['Individual' => $individual];
    }

    public function edit(Individual $individual, IndividualForm $form)
    {
        return ['form' => $form->edit($individual)];
    }

    public function update(ValidateIndividualRequest $request, Individual $individual)
    {
        $individual->fill($request->all());

        $individual->save();

        return ['message' => __('The Individual was successfully updated')];
    }

    public function destroy(Individual $individual)
    {
        $individual->delete();

        return [
            'message' => __('The Individual was successfully deleted'),
            'redirect' => 'administration.individuals.index',
        ];
    }
}
