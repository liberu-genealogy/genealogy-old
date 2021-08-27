<?php

namespace App\Forms\Builders;

use App\Models\Subm;
use LaravelEnso\Forms\Services\Form;

class SubmForm
{
    protected const TemplatePath = __DIR__.'/../Templates//subm.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Subm $subm)
    {
        return $this->form->edit($subm);
    }
}
