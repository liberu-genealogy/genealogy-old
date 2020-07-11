<?php

namespace App\Http\Requests\enso\Core;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use App\Models\User;

class PasswordValidator
{
    private Request $request;
    private Validator $validator;
    private User $user;

    public function __construct(Request $request, Validator $validator, User $user)
    {
        $this->request = $request;
        $this->validator = $validator;
        $this->user = $user;
    }

    public function handle()
    {
        if ($this->user->currentPasswordIs($this->request->get('password'))) {
            $this->validator->errors()
                ->add('password', __('You cannot use the existing password'));
        }

        if (! $this->hasMinUppercase()) {
            $this->validator->errors()
                ->add('password', __('Minimum upper case letters count is :number', [
                    'number' => config('enso.auth.password.minUpperCase'),
                ]));
        }

        if (! $this->hasMinNumeric()) {
            $this->validator->errors()
                ->add('password', __('Minimum numeric characters count is :number', [
                    'number' => config('enso.auth.password.minNumeric'),
                ]));
        }

        if (! $this->hasMinSpecial()) {
            $this->validator->errors()
                ->add('password', __('Minimum special characters count is :number', [
                    'number' => config('enso.auth.password.minSpecial'),
                ]));
        }
    }

    private function hasMinUppercase()
    {
        if (! config('enso.auth.password.minUpperCase')) {
            return true;
        }

        preg_match_all('/[A-Z]+/', $this->request->get('password'), $matches);

        return $this->length($matches) >= config('enso.auth.password.minUpperCase');
    }

    private function hasMinNumeric()
    {
        if (! config('enso.auth.password.minNumeric')) {
            return true;
        }

        preg_match_all('/[0-9]+/', $this->request->get('password'), $matches);

        return $this->length($matches) >= config('enso.auth.password.minNumeric');
    }

    private function hasMinSpecial()
    {
        if (! config('enso.auth.password.minSpecial')) {
            return true;
        }

        preg_match_all('/[^\da-zA-Z0-9]+/', $this->request->get('password'), $matches);

        return $this->length($matches) >= config('enso.auth.password.minSpecial');
    }

    private function length($matches)
    {
        return Str::length((new Collection($matches))->flatten()->implode(''));
    }
}
