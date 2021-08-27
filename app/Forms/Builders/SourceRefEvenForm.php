<?php

namespace App\Forms\Builders;

use App\Models\SourceRefEven;
use LaravelEnso\Forms\Services\Form;

class SourceRefEvenForm
{
    protected const TemplatePath = __DIR__.'/../Templates//sourceRefEven.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(SourceRefEven $sourceRefEven)
    {
        return $this->form->edit($sourceRefEven);
    }
}
