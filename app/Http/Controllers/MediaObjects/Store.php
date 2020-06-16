<?php

namespace App\Http\Controllers\MediaObjects;

use App\MediaObject;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateMediaObjectRequest;

class Store extends Controller
{
    public function __invoke(ValidateMediaObjectRequest $request, MediaObject $object)
    {
        $object->fill($request->validated())->save();

        return [
            'message' => __('The object was successfully created'),
            'redirect' => 'objects.edit',
            'param' => ['object' => $object->id],
        ];
    }
}
