<?php

namespace App\Http\Controllers\Types;

use App\Http\Requests\ValidateTypeRequest;
use App\Models\Type;
use Illuminate\Routing\Controller;

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
