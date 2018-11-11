<?php

namespace App\Http\Controllers\Places;

use App\Place;
use App\Forms\Builders\PlaceForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidatePlaceRequest;

class PlaceController extends Controller
{
    public function create(PlaceForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidatePlaceRequest $request)
    {
        $place = new Place($request->all());

        $place->save();

        return [
            'message' => __('The place was successfully created'),
            'redirect' => 'places.edit',
            'param' => ['place' => $place->id],
        ];
    }

    public function show(Place $place)
    {
        return ['place' => $place];
    }

    public function edit(Place $place, PlaceForm $form)
    {
        return ['form' => $form->edit($place)];
    }

    public function update(ValidatePlaceRequest $request, Place $place)
    {
        $place->fill($request->all());

        $place->save();

        return ['message' => __('The place was successfully updated')];
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return [
            'message' => __('The place was successfully deleted'),
            'redirect' => 'places.index',
        ];
    }
}
