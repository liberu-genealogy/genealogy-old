<?php

namespace App\Forms\Builders;

use App\Family;
use LaravelEnso\FormBuilder\app\Classes\Form;

class FamilyForm
{
    private const TemplatePath = __DIR__.'/../Templates/family.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
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
