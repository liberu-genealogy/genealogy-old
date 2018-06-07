<?php

namespace App\Forms\Builders;

use App\Citation;
use App\Source;
use LaravelEnso\FormBuilder\app\Classes\Form;

class CitationForm
{
    private const TemplatePath = __DIR__.'/../Templates/citation.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->options('source_id', Source::get(['sources.name', 'sources.id']))
            ->create();
    }

    public function edit(Citation $citation)
    {
        return $this->form->options('source_id', Source::get(['sources.name', 'sources.id']))
            ->edit($citation);
    }
}
