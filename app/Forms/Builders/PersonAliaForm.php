<?php

namespace App\Forms\Builders;

use App\Models\PersonAlia;
use LaravelEnso\Forms\Services\Form;

class PersonAliaForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personAlia.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonAlia $personAlia)
    {
        return $this->form->edit($personAlia);
    }
}
