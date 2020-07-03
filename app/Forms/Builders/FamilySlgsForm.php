<?php

namespace App\Forms\Builders;

use App\FamilySlgs;
use LaravelEnso\Forms\App\Services\Form;

class FamilySlgsForm
{
    protected const TemplatePath = __DIR__.'/../Templates//familySlgs.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(FamilySlgs $familySlgs)
    {
        return $this->form->edit($familySlgs);
    }
}
