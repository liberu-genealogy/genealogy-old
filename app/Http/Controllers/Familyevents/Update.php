<?php

namespace App\Http\Controllers\Familyevents;

use App\FamilyEvent;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidateFamilyEventRequest;

class Update extends Controller
{
    public function __invoke(ValidateFamilyEventRequest $request, FamilyEvent $familyEvent)
    {
        $familyEvent->update($request->validated());

        return ['message' => __('The family event was successfully updated')];
    }
}
