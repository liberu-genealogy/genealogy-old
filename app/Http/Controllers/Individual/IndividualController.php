<?php

namespace App\Http\Controllers\Administration\Individual;

use App\Individual;
use App\Forms\Builders\IndividualForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateIndividualRequest;
use LaravelEnso\Core\app\Classes\ProfileBuilder;

class IndividualController extends Controller
{

    public function create(IndividualForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateIndividualRequest $request)
    {
        $individual = new Individual($request->all());

        $this->authorize('handle', $individual);

        $individual->save();

        return [
            'message' => __('The Individual was successfully created'),
            'redirect' => 'administration.individuals.edit',
            'id' => $individual->id,
        ];
    }

    public function show(Individual $individual)
    {
        (new ProfileBuilder($individual))->set();

        return ['Individual' => $individual];
    }

    public function edit(Individual $individual, IndividualForm $form)
    {
        return ['form' => $form->edit($individual)];
    }

    public function update(ValidateIndividualRequest $request, Individual $individual)
    {
        $individual->fill($request->all());

        $this->authorize('handle', $individual);

        $individual->save();

        return ['message' => __('The Individual was successfully updated')];
    }

    public function destroy(Individual $individual)
    {
        $this->authorize('handle', $individual);

        $individual->delete();

        return [
            'message' => __('The Individual was successfully deleted'),
            'redirect' => 'administration.individuals.index',
        ];
    }
}
