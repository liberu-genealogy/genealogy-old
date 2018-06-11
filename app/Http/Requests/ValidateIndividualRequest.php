<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateIndividualRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|max:50',
            'last_name'  => 'required|max:50',
            'gender'     => 'required',
            'is_active'  => 'boolean',
        ];
    }
}
