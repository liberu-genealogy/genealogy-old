<?php

namespace App\Forms\Builders;

use LaravelEnso\Discussions\Models\Discussion;
use LaravelEnso\Forms\Services\Form;

class PostForm
{
    protected const TemplatePath = __DIR__.'/../Templates//posts.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Discussion $discussion)
    {
        return $this->form->edit($discussion);
    }
}
