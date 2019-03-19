<?php

namespace App\Http\Controllers\Events;

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
        $event = Event::create($request->all());

        return [
            'message' => __('The event was successfully created'),
            'redirect' => 'events.edit',
            'param' => ['event' => $event->id],
        ];
    }

    public function show(Event $event)
    {
        return ['event' => $event];
    }

    public function edit(Event $event, EventForm $form)
    {
        return ['form' => $form->edit($event)];
    }

    public function update(ValidateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return ['message' => __('The event was successfully updated')];
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return [
            'message' => __('The event was successfully deleted'),
            'redirect' => 'events.index',
        ];
    }
}
