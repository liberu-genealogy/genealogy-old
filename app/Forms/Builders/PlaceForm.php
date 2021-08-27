<?php

namespace App\Forms\Builders;

use App\Models\Place;
use LaravelEnso\Forms\Services\Form;

class PlaceForm
{
    protected const TemplatePath = __DIR__.'/../Templates/places.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Place $place)
    {
        return $this->form->edit($place);
    }
}
