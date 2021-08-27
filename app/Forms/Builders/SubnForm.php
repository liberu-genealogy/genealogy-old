<?php

namespace App\Forms\Builders;

use App\Models\Subn;
use LaravelEnso\Forms\Services\Form;

class SubnForm
{
    protected const TemplatePath = __DIR__.'/../Templates//subn.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Subn $subn)
    {
        return $this->form->edit($subn);
    }
}
