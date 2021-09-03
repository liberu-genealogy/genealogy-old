<?php

namespace App\Forms\Builders;

use App\Models\Family;
use App\Models\FamilyEvent;
use App\Models\Place;
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
        return $this->form->options('family_id', Family::all())->options('place_id', Place::all())->create();
        // return $this->form->options(['family_id' => Family::all(), 'place_id' => Place::all()])->create();
    }

    public function edit(FamilyEvent $familyEvent)
    {
        return $this->form->options('family_id', Family::all())->options('place_id', Place::all())->edit($familyEvent);
        // return $this->form->options(['family_id' => Family::all(), 'place_id' => Place::all()])->edit($familyEvent);
    }
}
