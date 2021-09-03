<?php

namespace App\Http\Controllers\Personevent;

use App\Http\Requests\ValidatePersonEventRequest;
use App\Models\PersonEvent;
use Illuminate\Routing\Controller;

class Update extends Controller
{
    public function __invoke(ValidatePersonEventRequest $request, PersonEvent $personEvent)
    {
        $personEvent->update($request->validated());

        return ['message' => __('The person event was successfully updated')];
    }
}
