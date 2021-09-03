<?php

namespace App\Http\Controllers\Personevent;

use App\Http\Requests\ValidatePersonEventRequest;
use App\Models\PersonEvent;
use Illuminate\Routing\Controller;

class Store extends Controller
{
    public function __invoke(ValidatePersonEventRequest $request, PersonEvent $personEvent)
    {
        $personEvent->fill($request->validated())->save();

        return [
            'message' => __('The person event was successfully created'),
            'redirect' => 'personevent.edit',
            'param' => ['person_event' => $personEvent->id],
        ];
    }
}
