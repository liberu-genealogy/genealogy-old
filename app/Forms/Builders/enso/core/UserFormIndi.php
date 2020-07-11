<?php

namespace App\Forms\Builders\enso\core;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Forms\Services\Form;

class UserFormIndi
{
    protected const TemplatePath = __DIR__.'/../../../Templates/enso/core/userindi.json';

    protected const Tooltip = 'Personal information can only be edited via the person form';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(self::TemplatePath);
    }

    public function create($person)
    {
        $this->common($person);

        return $this->form->value('email', $person->email)
            ->value('person_id', $person->id)
            ->create();
    }

    public function edit(User $user)
    {
        $this->common($user->person);

        if (Auth::user()->can('change-password', $user)) {
            $this->form->show([
                'password', 'password_confirmation',
            ]);
        }

        return $this->form->value('password', null)
            ->append('personId', $user->person_id)
            ->actions(['back', 'show', 'update'])
            ->edit($user);
    }

    protected function common($person)
    {
        $this->form->value('title', $person->title)
            ->value('name', $person->name)
            ->value('appellative', $person->appellative)
            ->meta('title', 'tooltip', self::Tooltip)
            ->meta('name', 'tooltip', self::Tooltip)
            ->meta('appellative', 'tooltip', self::Tooltip);
    }
}
