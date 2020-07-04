<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePersonAnciRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $personanci = $this->route('personanci');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'anci' => 'required|max:50',
        ];
    }
}
