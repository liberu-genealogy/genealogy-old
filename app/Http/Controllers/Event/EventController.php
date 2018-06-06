<?php

namespace App\Http\Controllers\Event;

use App\Event;
use App\Forms\Builders\EventForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateEventRequest;

class EventController extends Controller
{
    public function create(EventForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateEventRequest $request)
    {
        $event = new Event($request->all());

        $event->save();

        return [
            'message' => __('The Event was successfully created'),
            'redirect' => 'events.edit',
            'id' => $event->id,
        ];
    }

    public function show(Event $event)
    {
        return ['Event' => $event];
    }

    public function edit(Event $event, EventForm $form)
    {
        return ['form' => $form->edit($event)];
    }

    public function update(ValidateEventRequest $request, Event $event)
    {
        $event->fill($request->all());

        $event->save();

        return ['message' => __('The Event was successfully updated')];
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return [
            'message' => __('The Event was successfully deleted'),
            'redirect' => 'events.index',
        ];
    }
}
