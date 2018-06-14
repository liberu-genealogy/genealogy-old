<?php

namespace App\Http\Controllers\Family;

use App\Family;
use App\Forms\Builders\FamilyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateFamilyRequest;
use App\Individual;
use App\Person;

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

        $father = Person::findOrFail($father_id);
        $mother = Person::findOrFail($mother_id);

        foreach($individualsList as $individual)
        {
            $id = Individual::select('id','name')->where('name', '=', $individual->name);
            $person = Person::find($id);
            $person->father()->attach($father);
            $person->mother()->attach($mother);
        }

        return [
            'message'  => __('The Family was successfully created'),
            'redirect' => 'families.edit',
            'id'       => $family->id,
        ];
    }

    public function show(Family $family)
    {
        return $family->individuals()->get(['individuals.id', 'individuals.first_name', 'individuals.last_name']);
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

        $father = Person::findOrFail($father_id);
        $mother = Person::findOrFail($mother_id);

        foreach($individualsList as $individual)
        {

            $id = Individual::select('id','name')->where('name', '=', $individual->name);
            $person = Person::find($id);
            $person = Person::find($individual->id);
            $person->father()->attach($father);
            $person->mother()->attach($mother);
        }



        return ['message' => __('The Family was successfully updated')];
    }

    public function destroy(Family $family)
    {
        $family->delete();

        return [
            'message'  => __('The Family was successfully deleted'),
            'redirect' => 'families.index',
        ];
    }
}
