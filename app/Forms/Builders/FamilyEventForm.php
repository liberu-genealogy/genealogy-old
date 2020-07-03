<?php

namespace App\Forms\Builders;

use App\FamilyEvent;
use LaravelEnso\Forms\Services\Form;

class FamilyEventForm
{
    protected const TemplatePath = __DIR__.'/../Templates//familyEvent.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(FamilyEvent $familyEvent)
    {
        return $this->form->edit($familyEvent);
    }
}
