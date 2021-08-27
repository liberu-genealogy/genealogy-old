<?php

namespace App\Forms\Builders;

use App\Models\Refn;
use LaravelEnso\Forms\Services\Form;

class RefnForm
{
    protected const TemplatePath = __DIR__.'/../Templates//refn.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Refn $refn)
    {
        return $this->form->edit($refn);
    }
}
