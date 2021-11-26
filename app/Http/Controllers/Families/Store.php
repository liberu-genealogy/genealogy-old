<?php

namespace App\Http\Controllers\Families;

use App\Http\Requests\ValidateFamilyRequest;
use App\Models\Family;
use App\Models\Person;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateFamilyRequest $request, Family $family)
    {
        $family->fill($request->validated())->save();
        if ($family) {
            $family->children()->saveMany(Person::whereIn('id', $request->get('child_id', []))->get());
        }

        return [
            'message' => __('The family was successfully created'),
            'redirect' => 'families.edit',
            'param' => ['family' => $family->id],
        ];
    }
}
