<?php

namespace App\Http\Controllers\Personsubm;

use App\PersonSubm;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonSubmRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonSubmRequest $request, PersonSubm $personSubm)
    {
        $personSubm->update($request->validated());

        return ['message' => __('The person subm was successfully updated')];
    }
}
