<?php

namespace App\Http\Controllers\Families;

use App\Family;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateFamilyRequest;

class Update extends Controller
{
    public function __invoke(ValidateFamilyRequest $request, Family $family)
    {
        $family->update($request->validated());

        return ['message' => __('The family was successfully updated')];
    }
}
