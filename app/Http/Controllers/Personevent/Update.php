<?php

namespace App\Http\Controllers\Personevent;

use App\PersonEvent;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonEventRequest;

class Update extends Controller
{
    public function __invoke(ValidatePersonEventRequest $request, PersonEvent $personEvent)
    {
        $personEvent->update($request->validated());

        return ['message' => __('The person event was successfully updated')];
    }
}
