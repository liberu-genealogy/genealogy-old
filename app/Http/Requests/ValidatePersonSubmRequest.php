<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonSubmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('personsubm');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'subm' => 'required|max:50',
        ];
    }
}
