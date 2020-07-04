<?php

namespace App\Http\Controllers\Familyslugs;

use App\FamilySlgs;
use App\Http\Requests\ValidateFamilySlgsRequest;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateFamilySlgsRequest $request, FamilySlgs $familySlgs)
    {
        $familySlgs->fill($request->validated())->save();

        return [
            'message' => __('The family slgs was successfully created'),
            'redirect' => 'familyslugs.edit',
            'param' => ['familySlgs' => $familySlgs->id],
        ];
    }
}
