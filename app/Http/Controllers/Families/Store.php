<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use App\Http\Requests\ValidateFamilyRequest;
use Illuminate\Routing\Controller;

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
