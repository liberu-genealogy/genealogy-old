<?php

namespace App\Http\Controllers\Personevent;

use App\PersonEvent;
use Illuminate\Routing\Controller;
use App\Http\Requests\ValidatePersonEventRequest;

class Store extends Controller
{
    public function __invoke(ValidatePersonEventRequest $request, PersonEvent $personEvent)
    {
        $personEvent->fill($request->validated())->save();

        return [
            'message' => __('The person event was successfully created'),
            'redirect' => 'personevent.edit',
            'param' => ['personEvent' => $personEvent->id],
        ];
    }
}
