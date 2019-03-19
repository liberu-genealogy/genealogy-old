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

    public function store(ValidateFamilyRequest $request)
    {
        $family = Family::create($request->all());

        return [
            'message' => __('The family was successfully created'),
            'redirect' => 'family.edit',
            'param' => ['family' => $family->id],
        ];
    }

    public function show(Family $family)
    {
        return ['family' => $family];
    }

    public function edit(Family $family, FamilyForm $form)
    {
        return ['form' => $form->edit($family)];
    }

    public function update(ValidateFamilyRequest $request, Family $family)
    {
        $family->update($request->all());

        return ['message' => __('The family was successfully updated')];
    }

    public function destroy(Family $family)
    {
        $family->delete();

        return [
            'message' => __('The family was successfully deleted'),
            'redirect' => 'family.index',
        ];
    }
}
