<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateSourceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $source = $this->route('source');

        return [
            'description' => 'required|max:50',
            'date' => 'required|max:24',
            'is_active' => 'boolean',
        ];
    }
}
