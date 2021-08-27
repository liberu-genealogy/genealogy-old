<?php

namespace App\Forms\Builders;

use App\Models\SourceData;
use LaravelEnso\Forms\Services\Form;

class SourceDataForm
{
    protected const TemplatePath = __DIR__.'/../Templates//sourceData.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(SourceData $sourceData)
    {
        return $this->form->edit($sourceData);
    }
}
