<?php

namespace App\Forms\Builders;

use App\Models\SourceDataEven;
use LaravelEnso\Forms\Services\Form;

class SourceDataEvenForm
{
    protected const TemplatePath = __DIR__.'/../Templates//sourceDataEven.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(SourceDataEven $sourceDataEven)
    {
        return $this->form->edit($sourceDataEven);
    }
}
