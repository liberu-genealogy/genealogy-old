<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonAliaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('personalias');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'alia' => 'required|max:50',
        ];
    }
}
