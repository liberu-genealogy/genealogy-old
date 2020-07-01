<?php

namespace App\Forms\Builders;

use App\MediaObject;
use LaravelEnso\Forms\Services\Form;

class MediaObjectForm
{
    protected const TemplatePath = __DIR__.'/../Templates/mediaobject.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(MediaObject $object)
    {
        return $this->form->edit($object);
    }
}
