<?php

namespace App\Http\Controllers\Places;

use App\Place;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePlaceRequest;

class Update extends Controller
{
    public function __invoke(ValidatePlaceRequest $request, Place $place)
    {
        $place->update($request->validated());

        return ['message' => __('The place was successfully updated')];
    }
}
