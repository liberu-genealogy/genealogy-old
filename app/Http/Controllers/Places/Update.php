<?php

namespace App\Http\Controllers\Places;

use App\Http\Requests\ValidatePlaceRequest;
use App\Models\Place;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePlaceRequest $request, Place $place)
    {
        $place->update($request->validated());

        return ['message' => __('The place was successfully updated')];
    }
}
