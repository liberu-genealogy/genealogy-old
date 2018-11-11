<?php

namespace App\Http\Controllers\Relationship;

use App\Relationship;
use App\Http\Controllers\Controller;
use App\Forms\Builders\RelationshipForm;
use App\Http\Requests\ValidateRelationshipRequest;

class RelationshipController extends Controller
{
    public function create(RelationshipForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateRelationshipRequest $request)
    {
        $relationship = new Relationship($request->all());

        $relationship->save();

        return [
            'message' => __('The relationship was successfully created'),
            'redirect' => 'relationship.edit',
            'param' => ['relationship' => $relationship->id],
        ];
    }

    public function show(Relationship $relationship)
    {
        return ['relationship' => $relationship];
    }

    public function edit(Relationship $relationship, RelationshipForm $form)
    {
        return ['form' => $form->edit($relationship)];
    }

    public function update(ValidateRelationshipRequest $request, Relationship $relationship)
    {
        $relationship->fill($request->all());

        $relationship->save();

        return ['message' => __('The relationship was successfully updated')];
    }

    public function destroy(Relationship $relationship)
    {
        $relationship->delete();

        return [
            'message' => __('The relationship was successfully deleted'),
            'redirect' => 'relationship.index',
        ];
    }
}
