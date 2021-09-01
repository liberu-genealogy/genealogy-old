<?php

namespace App\Http\Controllers\Familyevents;

use App\Models\FamilyEvent;
use App\Http\Requests\ValidateFamilyEventRequest;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidateFamilyEventRequest $request, FamilyEvent $familyEvent)
    {
        $familyEvent->fill($request->validated())->save();

        return [
            'message' => __('The family event was successfully created'),
            'redirect' => 'familyevents.edit',
            'param' => ['familyEvent' => $familyEvent->id],
        ];
    }
}
