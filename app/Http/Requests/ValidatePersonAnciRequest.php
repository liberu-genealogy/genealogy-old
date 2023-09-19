<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonAnciRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        $this->route('personanci');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'anci' => 'required|max:50',
        ];
    }
}
