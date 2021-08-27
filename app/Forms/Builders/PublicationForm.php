<?php

namespace App\Forms\Builders;

use App\Models\Publication;
use LaravelEnso\Forms\Services\Form;

class PublicationForm
{
    protected const TemplatePath = __DIR__.'/../Templates//publication.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Publication $publication)
    {
        return $this->form->edit($publication);
    }
}
