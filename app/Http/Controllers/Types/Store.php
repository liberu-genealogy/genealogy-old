<?php

namespace App\Http\Controllers\Types;

use App\Type;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateTypeRequest;

class Store extends Controller
{
    public function __invoke(ValidateTypeRequest $request, Type $type)
    {
        $type->fill($request->validated())->save();

        return [
            'message' => __('The type was successfully created'),
            'redirect' => 'types.edit',
            'param' => ['type' => $type->id],
        ];
    }
}
