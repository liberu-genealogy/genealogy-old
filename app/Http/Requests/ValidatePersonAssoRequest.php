<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonAssoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('personassociation');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'rela' => 'required|max:50',
        ];
    }
}
