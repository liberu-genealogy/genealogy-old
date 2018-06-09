<?php

namespace App\Http\Controllers\Family;

use App\Family;
use App\Individual;
use App\Forms\Builders\FamilyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateFamilyRequest;

class FamilyController extends Controller
{
    public function create(FamilyForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateFamilyRequest $request, Family $family)
    {
        $family = $family->storeWithIndividuals(
            $request->all(),
            $request->get('individualList')
        );

        $individualsList = $request->get('individualList');

        $father_id = $request->get('father_id');
        $mother_id = $request->get('mother_id');

        Individual::find($father_id)->families()->attach($family->id, ['type_id' => 1]);
        $individuals = Individual::findOrFail($father_id);
        $individuals->parents()->attach($individualsList);

        $individuals = Individual::findOrFail($mother_id);
        $individuals->parents()->attach($individualsList);
        Individual::find($mother_id)->families()->attach($family->id, ['type_id' => 2]);

        return [
            'message' => __('The Family was successfully created'),
            'redirect' => 'families.edit',
            'id' => $family->id,
        ];
    }

    public function show(Family $family)
    {
        return $family->individuals()->get(array('individuals.id', 'individuals.first_name', 'individuals.last_name'));
    }

    public function edit(Family $family, FamilyForm $form)
    {
        return ['form' => $form->edit($family)];
    }

    public function update(ValidateFamilyRequest $request, Family $family)
    {
        $family->updateWithIndividuals(
            $request->all(),
            $request->get('individualList')
        );

        $individualsList = $request->get('individualList');

        $father_id = $request->get('father_id');
        $mother_id = $request->get('mother_id');

        Individual::find($father_id)->families()->attach($family->id, ['type_id' => 1]);
        $individuals = Individual::findOrFail($father_id);
        $individuals->parents()->attach($individualsList);

        $individuals = Individual::findOrFail($mother_id);
        $individuals->parents()->attach($individualsList);
        Individual::find($mother_id)->families()->attach($family->id, ['type_id' => 2]);

        return ['message' => __('The Family was successfully updated')];
    }

    public function destroy(Family $family)
    {
        $family->delete();

        return [
            'message' => __('The Family was successfully deleted'),
            'redirect' => 'families.index',
        ];
    }
}
