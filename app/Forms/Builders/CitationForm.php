<?php

namespace App\Forms\Builders;

use App\Citation;
use LaravelEnso\Forms\App\Services\Form;

class CitationForm
{
    protected const TemplatePath = __DIR__.'/../Templates/citations.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Citation $citation)
    {
        return $this->form->edit($citation);
    }
}
