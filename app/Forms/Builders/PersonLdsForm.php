<?php

namespace App\Forms\Builders;

use App\Models\PersonLds;
use LaravelEnso\Forms\Services\Form;

class PersonLdsForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personLds.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonLds $personLds)
    {
        return $this->form->edit($personLds);
    }
}
