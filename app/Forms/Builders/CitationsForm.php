<?php

namespace App\Forms\Builders;

use App\Citations;
use LaravelEnso\FormBuilder\app\Classes\Form;

class CitationsForm
{
    private const TemplatePath = __DIR__.'/../Templates/citations.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Citations $citations)
    {
        return $this->form->edit($citations);
    }
}
