<?php

namespace App\Http\Requests\enso\Core;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\enso\Core\PasswordValidator;

class ValidateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'person_id' => 'exists:people,id',
            'group_id' => 'required|exists:user_groups,id',
            'role_id' => 'required|exists:roles,id',
            'email' => ['email', 'required', $this->emailUnique()],
            'password' => 'confirmed|min:'.config('enso.auth.password.minLength'),
            'is_active' => 'boolean',
        ];
    }

    public function withValidator($validator)
    {
        if ($this->filled('password')) {
            $validator->after(fn ($validator) => (new PasswordValidator(
                $this, $validator, $this->route('user')
            ))->handle());
        }
    }

    protected function emailUnique()
    {
        return Rule::unique('people', 'email')->ignore($this->get('person_id'));
    }
}
