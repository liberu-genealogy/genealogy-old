<?php

namespace App\Forms\Builders;

use App\Models\Addr;
use LaravelEnso\Forms\Services\Form;

class AddrForm
{
    protected const TemplatePath = __DIR__.'/../Templates//addr.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Addr $addr)
    {
        return $this->form->edit($addr);
    }
}
