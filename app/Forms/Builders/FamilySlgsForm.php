<?php

namespace App\Forms\Builders;

use App\Models\FamilySlgs;
use LaravelLiberu\Forms\Services\Form;

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
