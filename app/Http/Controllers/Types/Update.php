<?php

namespace App\Http\Controllers\Types;

use App\Type;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateTypeRequest;

class Update extends Controller
{
    public function __invoke(ValidateTypeRequest $request, Type $type)
    {
        $type->update($request->validated());

        return ['message' => __('The type was successfully updated')];
    }
}
