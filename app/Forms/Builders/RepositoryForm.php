<?php

namespace App\Forms\Builders;

use App\repository;
use LaravelEnso\Forms\app\Services\Form;

class RepositoryForm
{
    private const TemplatePath = __DIR__.'/../Templates/repository.json';

    private $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(repository $repository)
    {
        return $this->form->edit($repository);
    }
}
