<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePublicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $publication = $this->route('publication');

        return [
            'description' => 'required|max:50',
            'name' => 'required|max:50',
            'is_active' => 'boolean',
        ];
    }
}
