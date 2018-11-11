<?php

namespace App\Http\Controllers\Family;

use App\Family;
use App\Person;
use App\Individual;
use App\Forms\Builders\FamilyForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateFamilyRequest;

class FamilyController extends Controller
{
    private function attach($family, $father_id, $mother_id, $individual_list)
    {
        Individual::find($father_id)->families()->attach($family->id, ['type_id' => 1]);
        $individuals = Individual::findOrFail($father_id);
        $individuals->parents()->attach($individual_list);

        $individuals = Individual::findOrFail($mother_id);
        $individuals->parents()->attach($individual_list);
        Individual::find($mother_id)->families()->attach($family->id, ['type_id' => 2]);

        $father = Individual::select('id', 'first_name', 'last_name')->where('id', '=', $father_id)->first();
        $mother = Individual::select('id', 'first_name', 'last_name')->where('id', '=', $mother_id)->first();

        $father_full_name = $father->first_name.' '.$father->last_name;
        $mother_full_name = $mother->first_name.' '.$mother->last_name;

        $father_person = Person::where('name', '=', $father_full_name)
            ->first();
        $mother_person = Person::where('name', '=', $mother_full_name)
            ->first();

        foreach ($individual_list as $individual) {
            $individual = Individual::find($individual);
            $individual_full_name = $individual->first_name.' '.$individual->last_name;
            $person = Individual::select('id', 'name')->where('name', '=', $individual_full_name)
                ->first();
            $person->father()->associate($father_person);
            $person->save();
            $person = Person::select('id', 'name')->where('name', '=', $individual_full_name)
                ->first();
            $person->mother()->associate($mother_person);
            $person->save();
        }
    }

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

        $individuals = $request->get('individualList');

        $father_id = $request->get('father_id');
        $mother_id = $request->get('mother_id');

        $this->attach($family, $father_id, $mother_id, $individuals);

        return [
            'message' => __('The Family was successfully created'),
            'redirect' => 'families.edit',
            'id' => $family->id,
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

        $individuals = $request->get('individualList');

        $father_id = $request->get('father_id');
        $mother_id = $request->get('mother_id');

        $this->attach($family, $father_id, $mother_id, $individuals);

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
