<?php

namespace App\Http\Controllers\Familyslugs;

use App\FamilySlgs;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateFamilySlgsRequest;

class Update extends Controller
{
    public function __invoke(ValidateFamilySlgsRequest $request, FamilySlgs $familySlgs)
    {
        $familySlgs->update($request->validated());

        return ['message' => __('The family slgs was successfully updated')];
    }
}
