<?php

namespace App\Forms\Builders;

use App\Source;
use LaravelEnso\FormBuilder\app\Classes\Form;

class SourceForm
{
    private const TemplatePath = __DIR__.'/../Templates/source.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Source $source)
    {
        return $this->form->edit($source);
    }
}
