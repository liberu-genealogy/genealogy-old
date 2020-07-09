<?php

namespace App\Forms\Builders;

use App\Profile;
use LaravelEnso\Forms\Services\Form;

class ProfileForm
{
    protected const TemplatePath = __DIR__.'/../Templates//profile.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Profile $profile)
    {
        return $this->form->edit($profile);
    }
}
