<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateFamilySlgsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('familyslgs');

        return [

            'family_id' => 'required|max:50',
            'stat' => 'required|max:50',
            'date' => 'required|max:50',
            'plac' => 'required|max:50',
            'temp' => 'required|max:50',
        ];
    }
}
