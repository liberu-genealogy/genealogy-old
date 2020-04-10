<?php

namespace App\Http\Controllers\Families;

use App\Family;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateFamilyRequest;

class Store extends Controller
{
    public function __invoke(ValidateFamilyRequest $request, Family $family)
    {
        $family->fill($request->validated())->save();

        return [
            'message' => __('The family was successfully created'),
            'redirect' => 'families.edit',
            'param' => ['family' => $family->id],
        ];
    }
}
