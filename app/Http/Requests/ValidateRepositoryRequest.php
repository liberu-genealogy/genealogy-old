<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRepositoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('repository');

        return [
            'description' => 'required|max:50',
            'name' => 'required|max:50',
            //         'type_id' => 'required|max:20',
            'date' => 'required|max:24',
            'is_active' => 'boolean',
        ];
    }
}
