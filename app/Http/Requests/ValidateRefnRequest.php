<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRefnRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $refn = $this->route('refn');

        return [

            'group' => 'required|max:50',
            'gid' => 'required|max:50',
            'refn' => 'required|max:50',
            'type' => 'required|max:50',
        ];
    }
}
