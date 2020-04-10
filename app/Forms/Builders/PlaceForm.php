<?php

namespace App\Forms\Builders;

use App\Place;
use LaravelEnso\Forms\App\Services\Form;

class PlaceForm
{
    protected const TemplatePath = __DIR__.'/../Templates//place.json';

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
