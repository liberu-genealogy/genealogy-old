<?php

namespace App\Forms\Builders;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use LaravelEnso\Forms\Services\Form;

class UserForm
{
    protected const TemplatePath = __DIR__.'/../Templates/user.json';

    protected const Tooltip = 'Personal information can only be edited via the person form';

    protected Form $form;

    public function __construct()
    {
        $this->form = new Form(static::TemplatePath);
    }

    public function create($person)
    {
        // $this->common($person);

        return $this->form->value('email', $person->email)
            ->value('person_id', $person->id)
            ->create();
    }

    public function edit(User $user)
    {
        // $this->common($user->person);

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

    // protected function common($person)
    // {
    //     $this->form->value('name', $person->name)
    //         ->value('appellative', $person->appellative)
    //         ->meta('name', 'tooltip', self::Tooltip)
    //         ->meta('appellative', 'tooltip', self::Tooltip);
    // }
}
