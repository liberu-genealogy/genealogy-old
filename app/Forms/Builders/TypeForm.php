<?php

namespace App\Forms\Builders;

use App\Models\Type;
use LaravelEnso\Forms\Services\Form;

class TypeForm
{
    protected const TemplatePath = __DIR__.'/../Templates/types.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Type $type)
    {
        return $this->form->edit($type);
    }
}
