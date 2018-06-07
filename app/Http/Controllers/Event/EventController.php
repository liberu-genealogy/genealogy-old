<?php

namespace App\Http\Controllers\Event;

use App\Event;
use Illuminate\Http\Request;
use App\Forms\Builders\EventForm;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidateEventRequest;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return Event::for($request->only([
            'evemts.id', 'event_id', 'event_type', 'event_types_name', 'events.is_active', 'events.name', 'events.description', 'events.date',
        ]))->join('event_types', 'event_types.id', '=', 'events.event_type_id')
            ->select('events.id', 'events.name', 'events.description', 'events.date', 'events.event_id', 'events.is_active', 'events.event_id', 'events.event_type', \DB::raw('event_types.name AS event_types_name'))
            ->orderBy('events.created_at', 'desc')
            ->get('events.id', 'events.events_id', 'events.events_type', 'events.name', 'events.description', 'event_types_name', 'events.is_active');
    }

    public function create(EventForm $form)
    {
        return ['form' => $form->create()];
    }

    public function store(ValidateEventRequest $request, Event $event)
    {
        $event->store(
        $request->all(),
        $request->get('_params')
    );

        return [
            'message' => __('The Event was successfully created'),
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
