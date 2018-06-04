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

        $this->authorize('handle', $event);

        $event->save();

        return [
            'message' => __('The Event was successfully created'),
            'redirect' => 'events.edit',
            'id' => $event->id,
        ];
    }

    public function show(Event $event)
    {
        (new ProfileBuilder($event))->set();

        return ['Event' => $event];
    }

    public function edit(Event $event, EventForm $form)
    {
        return ['form' => $form->edit($event)];
    }

    public function update(ValidateEventRequest $request, Event $event)
    {
        $event->fill($request->all());

        $this->authorize('handle', $event);

        $event->save();

        return ['message' => __('The Event was successfully updated')];
    }

    public function destroy(Event $event)
    {
        $this->authorize('handle', $event);

        $event->delete();

        return [
            'message' => __('The Event was successfully deleted'),
            'redirect' => 'events.index',
        ];
    }
}
