<?php

namespace App\Forms\Builders;

use App\Source;
use LaravelEnso\Forms\App\Services\Form;

class SourceForm
{
    protected const TemplatePath = __DIR__.'/../Templates//source.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
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
