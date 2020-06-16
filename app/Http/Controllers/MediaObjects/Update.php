<?php

namespace App\Http\Controllers\MediaObjects;

use App\MediaObject;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateMediaObjectRequest;

class Update extends Controller
{
    public function __invoke(ValidateMediaObjectRequest $request, MediaObject $object)
    {
        $object->update($request->validated());

        return ['message' => __('The object was successfully updated')];
    }
}
