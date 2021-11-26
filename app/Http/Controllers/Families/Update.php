<?php

namespace App\Http\Controllers\Families;

use App\Http\Requests\ValidateFamilyRequest;
use App\Models\Family;
use App\Models\Person;
use http\Env\Response;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateFamilyRequest $request, $family)
    {
        $family = Family::find($family);

        if ($family) {
            $family->update($request->validated());
            $family->children()->update(['child_in_family_id' => null]);
            $family->children()->saveMany(Person::whereIn('id', $request->get('child_id', []))->get());
        } else {
            //return with 404
        }

        return ['message' => __('The family was successfully updated')];
    }
}
