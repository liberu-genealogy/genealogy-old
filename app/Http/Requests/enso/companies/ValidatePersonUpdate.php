<?php

namespace App\Http\Requests\enso\companies;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_id' => 'required|exists:companies,id',
            'id' => 'required|exists:people,id',
            'position' => 'string|nullable',
        ];
    }
}
