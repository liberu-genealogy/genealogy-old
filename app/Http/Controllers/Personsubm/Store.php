<?php

namespace App\Http\Controllers\Personsubm;

use App\Http\Requests\ValidatePersonSubmRequest;
use App\Models\PersonSubm;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePersonSubmRequest $request, PersonSubm $personSubm)
    {
        $personSubm->fill($request->validated())->save();

        return [
            'message' => __('The person subm was successfully created'),
            'redirect' => 'personsubm.edit',
            'param' => ['person_subm' => $personSubm->id],
        ];
    }
}
