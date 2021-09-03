<?php

namespace App\Http\Controllers\Familyslugs;

use App\Http\Requests\ValidateFamilySlgsRequest;
use App\Models\FamilySlgs;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateFamilySlgsRequest $request, FamilySlgs $familySlgs)
    {
        $familySlgs->fill($request->validated())->save();

        return [
            'message' => __('The family slgs was successfully created'),
            'redirect' => 'familyslugs.edit',
            'param' => ['family_slg' => $familySlgs->id],
        ];
    }
}
