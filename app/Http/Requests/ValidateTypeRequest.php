<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $type = $this->route('type');

        return [
            'description' => 'required|max:50',
            'name' => 'required|max:50',
            'is_active' => 'boolean',
        ];
    }
}
