<?php

namespace App\Forms\Builders;

use App\Models\Category;
use LaravelEnso\Forms\Services\Form;

class CategoryForm
{
    protected const TemplatePath = __DIR__.'/../Templates//categories.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Category $category)
    {
        return $this->form->edit($category);
    }
}
