<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $author = $this->route('author');

        return [
            'description' => 'required|max:50',
            'name' => 'required|max:50',
            'is_active' => 'boolean',
        ];
    }
}
