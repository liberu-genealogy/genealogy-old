<?php

namespace App\Http\Controllers\Places;

use App\Place;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePlaceRequest;

class Store extends Controller
{
    public function __invoke(ValidatePlaceRequest $request, Place $place)
    {
        $place->fill($request->validated())->save();

        return [
            'message' => __('The place was successfully created'),
            'redirect' => 'places.edit',
            'param' => ['place' => $place->id],
        ];
    }
}
