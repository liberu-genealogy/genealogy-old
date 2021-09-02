<?php

namespace App\Http\Controllers\Families;

use App\Models\Family;
use App\Http\Requests\ValidateFamilyRequest;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateFamilyRequest $request, Family $family)
    {
        $family->update($request->validated());

        return ['message' => __('The family was successfully updated')];
    }
}
