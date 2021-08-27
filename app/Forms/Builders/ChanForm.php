<?php

namespace App\Forms\Builders;

use App\Models\Chan;
use LaravelEnso\Forms\Services\Form;

class ChanForm
{
    protected const TemplatePath = __DIR__.'/../Templates//chan.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Chan $chan)
    {
        return $this->form->edit($chan);
    }
}
