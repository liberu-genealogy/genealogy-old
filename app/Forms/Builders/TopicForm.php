<?php

namespace App\Forms\Builders;

use App\Models\Topic;
use LaravelEnso\Forms\Services\Form;

class TopicForm
{
    protected const TemplatePath = __DIR__.'/../Templates//topics.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Topic $topic)
    {
        return $this->form->edit($topic);
    }
}
