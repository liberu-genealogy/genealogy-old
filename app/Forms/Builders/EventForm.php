<?php

namespace App\Forms\Builders;

use App\Event;
use LaravelEnso\FormBuilder\app\Classes\Form;

class eventForm
{
    private const TemplatePath = __DIR__.'/../Templates/event.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Event $event)
    {
        return $this->form->edit($event);
    }
}