<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use LaravelEnso\People\Http\Requests\ValidatePersonRequest as EnsoPersonRequest;

class ValidatePersonRequest extends EnsoPersonRequest
{
    private Collection $companies;

    public function authorize()
    {
        return $this->emailUnchagedForUser();
    }

    public function rules()
    {
        return [
            'title' => 'integer|nullable',
            'givn' => 'max:100|nullable',
            'surn' => 'string|max:100|nullable',
            'name' => 'string|max:100|nullable',
            'uid' => ['string', 'nullable', $this->unique('uid')],
            'email' => ['email', 'nullable', $this->unique('email')],
            'phone' => 'max:30|nullable',
            'birthday' => 'nullable|date',
            'deathday' => 'nullable|date',
            'position' => 'integer|nullable',
            'obs' => 'string|nullable',
            'companies' => 'array',
            'companies.*' => 'exists:companies,id',
            'company' => 'nullable|exists:companies,id|in:'.implode(',', $this->get('companies')),
        ];
    }

    protected function unique(string $attribute)
    {
        return Rule::unique('people', $attribute)
            ->ignore(optional($this->route('person'))->id);
    }

    private function emailUnchagedForUser()
    {
        return ! optional($this->route('person'))->hasUser()
            || $this->get('email') === $this->route('person')->email;
    }
}
