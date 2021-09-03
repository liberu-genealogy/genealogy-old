<?php

namespace App\Http\Controllers\Personsubm;

use App\Http\Requests\ValidatePersonSubmRequest;
use App\Models\PersonSubm;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePersonSubmRequest $request, PersonSubm $personSubm)
    {
        $personSubm->update($request->validated());

        return ['message' => __('The person subm was successfully updated')];
    }
}
