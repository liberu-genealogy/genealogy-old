<?php

namespace App\Forms\Builders;

use App\Family;
use LaravelEnso\Forms\App\Services\Form;

class FamilyForm
{
    protected const TemplatePath = __DIR__.'/../Templates//family.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Family $family)
    {
        return $this->form->edit($family);
    }
}
