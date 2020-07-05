<?php

namespace App\Http\Requests\enso\companies;

use App\Person;

class ValidatePersonStore extends ValidatePersonUpdate
{
    public function withValidator($validator)
    {
        if ($this->personExists()) {
            $validator->after(fn ($validator) => $validator->errors()
                ->add('id', __('The selected person is already associated to this company')));
        }
    }

    private function personExists()
    {
        return Person::whereId($this->get('id'))
            ->whereHas('companies', fn ($companies) => $companies
                ->whereId($this->get('company_id')))->exists();
    }
}
