<?php

namespace App\Forms\Builders;

use App\Models\PersonAsso;
use LaravelEnso\Forms\Services\Form;

class PersonAssoForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personAsso.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonAsso $personAsso)
    {
        return $this->form->edit($personAsso);
    }
}
