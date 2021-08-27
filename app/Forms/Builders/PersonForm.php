<?php

namespace App\Forms\Builders;

// use App\Models\Person;
use LaravelEnso\Forms\Services\Form;
use LaravelEnso\People\Models\Person;

class PersonForm extends \LaravelEnso\People\Forms\Builders\PersonForm
{
    protected const TemplatePath = __DIR__.'/../Templates/person.json';

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

        return $this->form
            ->value('company', optional($person->company())->id)
            ->append('userId', optional($person->user)->id)
            ->edit($person);
    }
}
