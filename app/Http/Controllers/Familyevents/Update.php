<?php

namespace App\Http\Controllers\Familyevents;

use App\Http\Requests\ValidateFamilyEventRequest;
use App\Models\FamilyEvent;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidateFamilyEventRequest $request, FamilyEvent $familyEvent)
    {
        $familyEvent->update($request->validated());

        return ['message' => __('The family event was successfully updated')];
    }
}
