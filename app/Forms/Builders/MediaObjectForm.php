<?php

namespace App\Forms\Builders;

use App\Models\MediaObject;
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

    public function edit(MediaObject $media_objects)
    {
        return $this->form->edit($media_objects);
    }
}
