<?php

namespace App\Forms\Builders;

use App\Models\Citation;
use App\Models\Source;
use LaravelEnso\Forms\Services\Form;

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
        return $this->form->options('source_id', Source::all())->create();
    }

    public function edit(Citation $citation)
    {
        return $this->form->options('source_id', Source::all())->edit($citation);
    }
}
