<?php

namespace App\Forms\Builders;

use App\Models\Person;
use LaravelEnso\Forms\Services\Form;

class PersonFormIndi
{
    protected const TemplatePath = __DIR__.'/../Templates/personindi.json';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create()
    {
        return $this->form->create();
    }

    public function edit(Person $person)
    {
        if ($person->hasUser()) {
            $this->form->meta(
                'email',
                'tooltip',
                'Email can only be edited via the user form'
            )->readonly('email');
        }
        $actions = ['back', 'update'];

        return $this->form
            ->value('company', optional($person->company())->id)
            ->append('userId', optional($person->user)->id)
            ->actions($actions)
            ->edit($person);
    }
}
