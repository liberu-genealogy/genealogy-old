<?php

namespace App\Forms\Builders;

use App\source;
use LaravelEnso\Forms\app\Services\Form;

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

    public function edit(source $source)
    {
        return $this->form->edit($source);
    }
}
