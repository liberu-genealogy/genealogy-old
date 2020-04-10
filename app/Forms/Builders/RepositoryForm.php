<?php

namespace App\Forms\Builders;

use App\Repository;
use LaravelEnso\Forms\App\Services\Form;

class RepositoryForm
{
    protected const TemplatePath = __DIR__.'/../Templates/repositories.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Repository $repository)
    {
        return $this->form->edit($repository);
    }
}
