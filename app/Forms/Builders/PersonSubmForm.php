<?php

namespace App\Forms\Builders;

use App\Models\PersonSubm;
use LaravelEnso\Forms\Services\Form;

class PersonSubmForm
{
    protected const TemplatePath = __DIR__.'/../Templates//personSubm.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(PersonSubm $personSubm)
    {
        return $this->form->edit($personSubm);
    }
}
