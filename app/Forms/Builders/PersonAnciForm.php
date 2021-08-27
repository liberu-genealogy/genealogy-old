<?php

namespace App\Forms\Builders;

use App\Models\PersonAnci;
use LaravelEnso\Forms\Services\Form;

class PersonAnciForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personAnci.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonAnci $personAnci)
    {
        return $this->form->edit($personAnci);
    }
}
