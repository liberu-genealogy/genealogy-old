<?php

namespace App\Forms\Builders;

use App\Event;
use App\EventType;
use LaravelEnso\FormBuilder\app\Classes\Form;

class EventForm
{
    private const TemplatePath = __DIR__.'/../Templates/event.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->options('event_type_id', EventType::with('events')->get(['event_types.name', 'event_types.id']))->title('Insert')
            ->create();
    }

    public function edit(Event $event)
    {
        return $this->form->options('event_type_id', EventType::with('events')->get(['event_types.name', 'event_types.id']))
         //   ->options('individual_id', Event::with('individuals')->get(['individuals.first_name', 'individuals.id']))
            ->title('Edit')
            ->actions(['update'])
            ->edit($event);
    }
}
