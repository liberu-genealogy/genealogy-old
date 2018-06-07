<?php

namespace App\Forms\Builders;

use App\Repository;
use LaravelEnso\FormBuilder\app\Classes\Form;

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

    public function edit(Repository $repository)
    {
        return $this->form->edit($repository);
    }
}
