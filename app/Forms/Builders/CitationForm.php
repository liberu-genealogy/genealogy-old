<?php

namespace App\Forms\Builders;

use App\Citation;
use LaravelEnso\Forms\app\Services\Form;

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
        return $this->form->create();
    }

    public function edit(Citation $citation)
    {
        return $this->form->edit($citation);
    }
}
