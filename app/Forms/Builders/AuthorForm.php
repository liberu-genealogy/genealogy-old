<?php

namespace App\Forms\Builders;

use App\Models\Author;
use LaravelEnso\Forms\Services\Form;

class AuthorForm
{
    protected const TemplatePath = __DIR__.'/../Templates//author.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Author $author)
    {
        return $this->form->edit($author);
    }
}
