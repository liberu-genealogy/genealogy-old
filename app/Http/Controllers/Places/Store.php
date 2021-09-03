<?php

namespace App\Http\Controllers\Places;

use App\Http\Requests\ValidatePlaceRequest;
use App\Models\Place;
use Illuminate\Routing\Controller;

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
