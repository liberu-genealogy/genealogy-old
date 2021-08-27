<?php

namespace App\Forms\Builders;

use App\Models\Repository;
use App\Models\Type;
use LaravelEnso\Forms\Services\Form;

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
        return $this->form
        ->options('type_id', Type::all())
        ->create();
    }

    public function edit(Repository $repository)
    {
        return $this->form
        ->options('type_id', Type::all())
        ->edit($repository);
    }
}
