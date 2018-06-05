<?php

namespace App\Http\Controllers\Family;

use App\Family;
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

        return [
            'message' => __('The Family was successfully created'),
            'redirect' => 'families.edit',
            'id' => $family->id,
        ];
    }

    public function edit(Family $family, FamilyForm $form)
    {
        return ['form' => $form->edit($family)];
    }

    public function update(ValidateFamilyRequest $request, Family $family)
    {
        $family->updateWithChildren(
            $request->all(),
            $request->get('individualList')
        );

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
