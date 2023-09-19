<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePublicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('publication');

        return [
            'description' => 'required|max:50',
            'name' => 'required|max:50',
            'is_active' => 'boolean',
        ];
    }
}
